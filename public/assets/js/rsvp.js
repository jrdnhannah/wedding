/**
 * @typedef {Object} Guest
 * @property {String[]} names
 * @property {int}      plus_ones
 * @property {String[]} invited_to
 */

/**
 * @param {Object} config
 * @param {Object} config.form
 * @param {string} config.form.stepOne      Rendered step #1 form
 * @param {string} config.form.stepTwo      Rendered step #2 form
 * @param {string} config.menu.standard     Rendered menu
 * @param {string} config.menu.plusOne      Rendered plus one menu
 * @param {string} config.menu.reception    Reception menu
 * @param {string} config.modal             The selector of the modal to render into
 * @param {Function} config.stepTwoCallback
 * @param {Array} config.guests
 * @constructor
 */
function Rsvp(config) {
    $.extend(config, {
        modal: '#rsvp-modal',
        stepTwoCallback: function (data) {
            $.ajax({
                url:  '/rsvp',
                type: 'POST',
                data: data
            }).success(function (response) {
                var $msg

                if (response.coming) {
                    $msg = $('<p>We look forward to seeing you on the day!</p>')
                } else {
                    $msg = $('<p>We are sorry that we won\'t see you on the day</p>')
                }

                this.getModal().find('.modal-body').html([$('<p>Thank you for RSVPing!</p>'), $msg])
            }.bind(this)).fail(function (xhr) {
                $.each(xhr.responseJSON, function (field, errors) {
                    $('[name="' + field + '"]').css({
                        'border': '2px solid red',
                        'border-radius': '5px'
                    })
                })
                this.getModal().find('#form-messages').addClass('bg-danger well-sm').html($('<p>Oops, something has gone wrong!<br /> Give the RSVP form ' +
                    'another once over and then submit it again</p>'))


            }.bind(this)).done(function () {
                $(window).scrollTo(this.getModal())
            }.bind(this))
        }.bind(this)
    })

    this.getStepOneForm = function () {
        return config.form.stepOne
    }

    this.getStepTwoForm = function () {
        return config.form.stepTwo
    }

    this.getPlusOneMenu = function () {
        return config.menu.plusOne
    }

    this.getMenu = function () {
        return config.menu.standard
    }

    this.getReceptionMenu = function () {
        return config.menu.reception
    }

    /**
     * @returns {Function}
     */
    this.getStepTwoCallback = function () {
        return config.stepTwoCallback
    }

    this.getModal = function () {
        return $(config.modal)
    }
}

Rsvp.prototype = {
    /**
     * @param {Guest[]} invitee
     * @returns {jQuery[]}
     */
    renderMainInvitees:  function (invitee) {
        var htmlElements = [
            $('<label />', {text: "Who's coming?"})
        ]

        for (var idx in invitee.names) {
            htmlElements.push($('<div />', {
                'class': 'checkbox',
                'html':  [
                    $('<label />', {
                        html: [
                            $('<input type="checkbox" id="invitee-cbx-' + idx + '" name="guests-coming[]" value="' + invitee.names[idx] + '" checked />')
                                .change(function (idx) {
                                    if ($('#invitee-cbx-' + idx).is(':checked')) {
                                        $('.menu-group')
                                            .find('#menu-panel-' + idx)
                                            .find('select')
                                            .attr('required', 'required')
                                            .end()
                                            .removeClass('not-coming')
                                            .show()
                                    } else {
                                        $('.menu-group')
                                            .find('#menu-panel-' + idx)
                                            .find('select')
                                            .removeAttr('required')
                                            .end()
                                            .addClass('not-coming')
                                            .hide()
                                    }
                                }.bind(this, idx)),
                            invitee.names[idx]
                        ]
                    })
                ]
            }))
        }

        return htmlElements
    },

    /**
     * @param {Guest} guest
     * @returns {jQuery}
     */
    renderMenu: function (guest) {
        return $('<div />', {
            'class': 'panel-group',
            'id':    'menu-accordion',
            'html':  function () {
                var htmlElements = []
                for (var idx in guest.names) {
                    htmlElements.push($('<div class="panel panel-default" id="menu-panel-' + idx + '" />')
                        .html([
                            $('<div class="panel-heading" />')
                                .html($('<h4 class="panel-title" />')
                                    .html($('<a />', {
                                        'data-toggle': 'collapse',
                                        'data-parent': '#menu-accordion',
                                        href:          '#menu-invitee-' + idx,
                                        text:          guest.names[idx]
                                    }))),
                            $('<div id="menu-invitee-' + idx + '" class="panel-collapse collapse"/>')
                                .html($('<div class="panel-body" />')
                                    .html($('<div />')
                                        .html((function (guest, tree, idx) {
                                            if (guest.invited_to.indexOf('ceremony') > -1) {
                                                return tree.getMenu().replace(/_ID_/gi, idx)
                                            }
                                            
                                            return tree.getReceptionMenu().replace(/_ID_/gi, idx)
                                        })(guest, this, idx))
                                        .append((function (guest, idx) {
                                            var key = guest.invited_to.indexOf('ceremony') > -1 ? 'invitee' : 'reception'
                                            return $('<input type="hidden" name="' + key + '[' + idx + '][name]" value="' + guest.names[idx] + '" />')
                                        })(guest, idx) )))
                        ])
                    )
                }

                for (var i = 0; i < guest.plus_ones; ++i) {
                    var count = (i + guest.names.length)
                    var $div  = $('<div class="panel panel-default" id="menu-panel-p1-' + count + '" />')
                        .html([
                            $('<div class="panel-heading" />')
                                .html($('<h4 class="panel-title" />')
                                    .html($('<a />', {
                                        'data-toggle': 'collapse',
                                        'data-parent': '#menu-accordion',
                                        href:          '#menu-invitee-' + count,
                                        text:          '+' + (i + 1)
                                    }))),
                            $('<div id="menu-invitee-' + count + '" class="panel-collapse collapse"/>')
                                .html($('<div class="panel-body" />')
                                    .html($('<div />')
                                        .html(this.getPlusOneMenu().replace(/_ID_/gi, i))))
                        ])
                    htmlElements.push($div)
                }

                return htmlElements
            }.bind(this)()
        })
    },

    /**
     * @param {Guest} guest
     * @returns {jQuery}
     */
    renderResponse: function (guest) {
        var $select = $('<select class="form-control" id="cevents" name="coming" aria-required="true" required />'),
            $group  = $('<optgroup label="Yes, we will be coming to..." />')

        $select.append($('<option value="" selected>Please select</option>'))


        if (guest.invited_to.indexOf('ceremony') > -1) {
            $group.append($('<option value="1">The ceremony & reception</option>'))
            $group.append($('<option value="2">The ceremony only</option>'))
        }

        $group.append($('<option value="3">The reception</option>'))

        $select.append($('<option value="0">Sorry, unfortunately we are unable to make it</option>'))
        $select.append($group)

        $select.on('change', function () {
            if (this.value == 0) {
                $('#menu-accordion').find('select').prop('required', false)
            } else {
                $('#menu-accordion').find('.panel:not(.not-coming)').find('select').filter(function () {
                    return this.name.indexOf('invitee') == 0
                }).prop('required', true)
            }
        })

        return $select
    },

    showStepOneForm: function () {
        var $modal = this.getModal().find('.modal-body').html(this.getStepOneForm()),
            $input = $modal.find('input#cname')
        $.get('/guests', function (guests) {
            $input.typeahead({ source: guests })
        })

        $modal.find('.rsvp-submit').on('click', function (e) {
            e.preventDefault()

            var name   = $('#rsvp-form').find('input#cname').val()

            $.ajax({
                type: 'GET',
                url:  '/guest-information',
                data: {
                    guest_name: name
                }
            }).success(function (invitee) {
                this.showStepTwoForm(invitee.guest)
            }.bind(this)).fail(function (response) {
                if (response.status == 404) {
                    $('.rsvp-404').slideDown()
                } else {
                    $('.general-error').slideDown()
                }
            })
        }.bind(this))
    },

    /**
     * @param {Guest} guest
     */
    showStepTwoForm: function (guest) {
        this.getModal()
            .find('.modal-body')
            .html(this.getStepTwoForm())
            .find('.menu-group .form-group-inner')
            .html(this.renderMenu(guest))
            .end()
            .find('div.response-choice')
            .html(this.renderResponse(guest))
            .end()
            .find('.guests-group .form-group-inner')
            .html(this.renderMainInvitees(guest))
            .end()

        this.getModal().find('button[type="submit"]').off('click').click(function (e) {
            e.preventDefault()

            this.applyRsvpValidationRules()

            var $form = this.getModal().find('form.rsvp-form')
            if ($form.valid()) {
                this.getStepTwoCallback().apply(this, [$form.serialize()])
            }
        }.bind(this))
    },

    applyRsvpValidationRules: function () {
        this.getModal().find('form.rsvp-form').validate({
            invalidHandler: function (e, validator) {
                // loop through the errors:
                for (var i = 0; i < validator.errorList.length; i++) {
                    // "uncollapse" section containing invalid input/s:
                    $(validator.errorList[i].element).closest('.panel-collapse.collapse').collapse('show');
                }
            },
            ignore: false,
            messages: {
                coming: {
                    required: 'Please let us know if you\'re coming' //You can customise this message
                }
            }
        })


        $("input[name*='[name]']").filter(function () { return this.name.indexOf('invitee') == 0 }).each(function () {
            $(this).rules('add', {
                required: true,
                messages: {
                    required: 'Please enter the name'
                }
            })
        })

        $("select[name*='[menu]']").filter(function () { return this.name.indexOf('invitee') == 0 }).each(function () {

            $(this).rules('add', {
                messages: {
                    required: 'Please make a menu choice'
                }
            })
        })
    }
}