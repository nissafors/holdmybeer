$(document).ready(function() {
    /*********************************************************
     * GLOBALS
     *********************************************************/

    // Only needed if laravel public is not your document root
    // (which it should be, but may not be during development)
    var URL_ROOT = '/holdmybeer/public';

    /*********************************************************
     * DATA SUPPLIERS
     *********************************************************/

    /**
     * Translate json from resource controllers to an array that openForm() can use.
     * @param resource
     * @param json
     * @returns {*[]}
     */
    function getFormData(resource, json) {
        switch (resource) {
            case 'grains':
                return [
                    json.id,
                    json.name,
                    json.vendorId,
                    json.grainTypeId,
                    json.grainClassId,
                    json.maxHWE,
                    json.degEBC,
                    json.mash,
                    json.steep
                ];
            case 'maltextracts':
                return [
                    json.id,
                    json.name,
                    json.vendorId,
                    json.maxHWE,
                    json.degEBC,
                    json.form,
                    json.prehopped
                ];
            case 'sugars':
                return [
                    json.id,
                    json.name,
                    json.vendorId,
                    json.maxHWE,
                    json.degEBC,
                    json.form
                ];
            case 'fermentables':
                return [
                    json.id,
                    json.name,
                    json.vendorId,
                    json.maxHWE,
                    json.degEBC
                ];
            case 'graintypes':
            case 'grainclasses':
            case 'yeastclasses':
                return [
                    json.id,
                    json.name
                ];
            case 'hops':
                return [
                    json.id,
                    json.name,
                    json.country.id,
                    json.typicalAA
                ];
            case 'yeasts':
                return [
                    json.id,
                    json.name,
                    json.vendorsProductId,
                    json.vendorId,
                    json.classId,
                    json.alcoholTolerance,
                    json.minAttenuation,
                    json.maxAttenuation,
                    json.minFermentationTemp,
                    json.maxFermentationTemp,
                    json.minRehydrationTemp,
                    json.maxRehydrationTemp,
                    json.flocculation,
                    json.form
                ];
            case 'finings':
                return [
                    json.id,
                    json.name,
                    json.vendorId
                ];
            case 'acids':
                return [
                    json.id,
                    json.name,
                    json.vendorId,
                    json.concentration,
                    json.mEqPerL,
                    json.form
                ];
            case 'watertreatments':
                return [
                    json.id,
                    json.name,
                    json.vendorId,
                    json.concentration,
                    json.form
                ];
            case 'salts':
                return [
                    json.id,
                    json.name,
                    json.vendorId,
                    json.cationId,
                    json.anionId,
                    json.concentration,
                    json.cationPpmAtOneGPerL,
                    json.anionPpmAtOneGPerL,
                    json.form
                ];
            case 'ions':
                return [
                    json.id,
                    json.name,
                    json.symbol,
                    json.charge
                ];
            case 'vendors':
                return [
                    json.id,
                    json.name,
                    json.countryId
                ];
        }
    }

    /**
     * Translate json from resource controllers to an array that updateTable() can use.
     * @param resource
     * @param json
     * @returns {*[]}
     */
    function getTableData(resource, json) {
        var vendor = json.vendor == null ? 'none' : json.vendor;
        var country = "";
        switch (resource) {
            case 'grains':
                return [
                    json.name,
                    vendor,
                    json.maxHWE,
                    json.degEBC,
                    json.grainType,
                    json.grainClass
                ];
            case 'maltextracts':
                var prehopped = json.prehopped == 1 ? 'Yes' : 'No';
                return [
                    json.name,
                    vendor,
                    json.maxHWE,
                    json.degEBC,
                    json.form,
                    prehopped
                ];
            case 'sugars':
                return [
                    json.name,
                    vendor,
                    json.maxHWE,
                    json.degEBC,
                    json.form
                ];
            case 'fermentables':
                return [
                    json.name,
                    vendor,
                    json.maxHWE,
                    json.degEBC
                ];
            case 'graintypes':
            case 'grainclasses':
            case 'yeastclasses':
                return [
                    json.name
                ];
            case 'hops':
                country = json.country === null ? 'none' : json.country.name;
                return [
                    json.name,
                    country,
                    json.typicalAA
                ];
            case 'yeasts':
                return [
                    json.name,
                    json.vendorsProductId,
                    json.vendor.name,
                    json.yeast_class.name,
                    json.form
                ];
            case 'finings':
                vendor = json.vendor === null ? 'none' : json.vendor.name;
                return [
                    json.name,
                    vendor
                ];
            case 'acids':
            case 'watertreatments':
                return [
                    json.name,
                    vendor,
                    json.form,
                    json.concentration
                ];
            case 'salts':
                return [
                    json.name,
                    vendor,
                    json.form,
                    json.concentration,
                    json.cation,
                    json.anion
                ];
            case 'ions':
                return [
                    json.name,
                    json.symbol,
                    json.charge
                ];
            case 'vendors':
                country = json.country === null ? 'none' : json.country.name;
                return [
                    json.name,
                    country
                ];
        }
    }

    /*********************************************************
     * GENERIC FUNCTIONS
     *********************************************************/

    /**
     * Add or update an ingredient.
     *
     * The form causing the submit event that triggers this function should have:
     * 1. data-resource="[resource]"
     * 2. .ingredient-edit-form
     * 3. #edit-[resource]-form
     * It must also have a submit button.
     * Every form group div with inputs that use serverside validation should have a .can-have-error.
     * See editIngredient() and openForm() for information on updating items.
     *
     * @param e - Sent by the form's submit event.
     */
    function addIngredient(e) {
        e.preventDefault();
        var form = this;
        var resource = this.dataset.resource;
        var method = "POST";
        var url = '/' + resource;
        var id;
        if ($(form).find('.ingman-dynamic-submit').length) {
            method = "PUT";
            id = form.dataset.id;
            url = url + '/' + id
        }
        ajaxSubmit(form, method, url,
            function() {
                $('form').closest('.modal').modal('hide');
                updateTable(resource);
            },
            function(status, err) {
                if (status === 422) {
                    // Validation error: show messages in form
                    removeErrorMessages(); // Remove old messages before adding new ones
                    var elements = $('form').closest('.modal').find('.can-have-error');
                    for (var i = 0; i < elements.length; i++) {
                        var msg = err[elements[i].dataset.error];
                        if (msg !== undefined) {
                            var span = $('<span class="help-block error-msg"><strong>' + msg + '</strong></span>');
                            elements[i].classList.add('has-error');
                            elements[i].appendChild(span[0]);
                        }
                    }
                }
                else {
                    $('form').closest('.modal').modal('hide');
                    alertServerError();
                }
            }
        );
    }

    /**
     * Edit an ingredient
     *
     * Acquire json data of an existing item and open a pre-filled form for updating.
     * See openForm() for more information.
     *
     * @param e
     */
    function editIngredient(e) {
        e.stopPropagation();
        var resource = this.dataset.resource;
        var id = $(this).val();
        var successCallback = function(data) { openForm(resource, data); };
        ajaxGet('/' + resource + '/' + id, successCallback, alertServerError);
    }

    /**
     * Delete an ingredient
     * @param e
     */
    function deleteIngredient(e) {
        e.stopPropagation();
        var resource = this.dataset.resource;
        var id = $(this).val();
        var successCallback = function() { updateTable(resource); };
        ajaxDelete('/' + resource + '/' + id, successCallback, alertServerError);
    }

    /**
     * Open the form for this resource and fill out for editing
     *
     * Open a #edit-[resource]-modal and fill out the form using data from the json parameter.
     * This function sends the json data it to getFormData(), which translates it to an array that it can use
     * to pre-fill the form it opens. For every new form you must add a switch case to getFormData() which
     * returns an array where the first item is the id of the item that we want to update. This id will be
     * used in the url when calling the server's update method like this: [URL_ROOT]/[resource]/[id]. The
     * following items int the array should be the data for the form elements in the order they appear in
     * the view. Use the value property for selects and radio buttons. Checkboxes will be checked if the
     * value is 1.
     *
     * @param resource
     * @param json
     */
    function openForm(resource, json) {
        // Get modal and form
        var modal = $('#edit-' + resource + '-modal');
        var form = $('#edit-' + resource + '-form');

        // Make the submit button an update button
        var submit = form.find(':submit');
        submit.val('Update');
        submit.addClass('ingman-dynamic-submit');

        $(modal).modal('show');

        // Fill out form
        var selectedArray = [];
        var formData = getFormData(resource, json);
        var inputs = form.find('input:not(:button, :submit, :radio), select, fieldset');
        form[0].dataset.id = formData[0];
        inputs.each(function(i) {
            if ($(this).is('select')) {
                var selected = formData[i + 1] == null ? '0' : formData[i + 1];
                selectedArray.push(selected);
            }
            else if ($(this).is(':checkbox') && formData[i + 1] == 1)
                this.checked = true;
            else if ($(this).is('fieldset')) {
                var radios = $(this).find(':radio');
                radios.each(function(j) {
                    this.checked = $(this).val() == formData[i + 1];
                });
            }
            else
                $(this).val(formData[i + 1]);
        });

        if (selectedArray.length > 0)
            populateSelects(modal, selectedArray);
    }

    /**
     * Remove all elements with .ingman-dynamic.
     * Reset submit buttons to Save.
     */
    function resetDynamicElements() {
        $('.ingman-dynamic').remove();
        var submits = $('.ingman-dynamic-submit');
        submits.val('Save');
        submits.removeClass('ingman-dynamic-submit');
    }

    /**
     * Load resource from server and print to a #ingman-[resource]-tbody.
     * This function acquires data on all items from this resource in json format. This data is translated by
     * getTableData() to an array that updateTable() can use. For every table added you must update getTableData()
     * to include a switch case for the resource that returns an array with the data to be viewed in the table in
     * the order they should appear.
     *
     * @param resource  - The name of the resource.
     */
    function updateTable(resource) {
        var tbody = $('#ingman-' + resource + '-tbody');
        var cols = tbody.closest('table').find('th').length;
        tbody.empty();
        tbody.append('<tr><td colspan="' + cols + '">Loading...</td></tr>');
        ajaxGet('/' + resource, function(data) {
            tbody.empty();
            for (var i = 0; i < data.length; i++) {
                var tr = $('<tr></tr>');
                var tdData = getTableData(resource, data[i]);
                for (var j = 0; j < tdData.length; j++) {
                    tr.append($('<td>' + tdData[j] + '</td>'))
                }

                tr.append($('<td>'
                            + '<button value="' + data[i].id + '" '
                                + 'class="btn btn-default btn-xs btn-info edit-button" '
                                + 'data-resource="' + resource + '" '
                                + 'aria-label="Edit" '
                                + 'data-toggle="tooltip" title="Edit">'
                                + '<span class="glyphicon glyphicon-pencil"></span>'
                            + '</button>'
                            + '<button value="' + data[i].id + '" '
                                + 'class="btn btn-default btn-xs btn-danger delete-button" '
                                + 'data-resource="' + resource + '" '
                                + 'aria-label="Delete" '
                                + 'data-toggle="tooltip" title="Delete">'
                                + '<span class="glyphicon glyphicon-trash"></span>'
                            + '</button>'
                    + '</td>'));
                tbody.append(tr);
                $('.edit-button').off().click(editIngredient);
                $('.delete-button').off().click(deleteIngredient);
                $('[data-toggle="tooltip"]').tooltip();
            }
        }, function() {
            tbody.empty();
            tbody.append('<tr><td colspan="' + cols + '">Failed retrieving vendors from server!</td></tr>');
        });
    }

    /**
     * Populate select's in e.target
     *
     * @param context - The context in which to search for selects
     * @param selectedArray - An array of values that corresponds to the values of the items that should be selected
     */
    function populateSelects(context, selectedArray) {
        var selects = $(context).find('select');
        populateNextSelect(selects, selectedArray);
    }

    /**
     * Populate comboboxes in boxes from ajax recursively
     *
     * @param selects - An ajax object or array of selects to populate
     * @param selectedArray - An array of values that corresponds to the values of the items that should be selected
     */
    function populateNextSelect(selects, selectedArray) {
        if (selects.length < 1)
            return;
        $(selects[0]).empty();
        var url = '/' + $(selects[0]).data('resource');
        ajaxGet(url,
            function(data) {
                // Ajax succes
                if ($(selects[0]).hasClass('nullable')) {
                    option = $('<option value="0">-- None --</option>');
                    $(selects[0]).append(option);
                }
                for (var i = 0; i < data.length; i++) {
                    option = $('<option value="' + data[i].id + '">' + data[i].name + '</option>');
                    $(selects[0]).append(option);
                }

                if (selectedArray) {
                    $(selects[0]).val(selectedArray[0]);
                    selectedArray = selectedArray.slice(1);
                }

                populateNextSelect(selects.slice(1), selectedArray);
            },
            function(status, err) {
                // Ajax error: close any modals and report error
                $('.modal').modal('hide');
                alertServerError();
            }
        );
    }

    /**
     * JQuery plugin to clear forms from http://www.learningjquery.com/2007/08/clearing-form-data
     * extended with more types.
     *
     * @returns {*}
     */
    $.fn.clearForm = function() {
        return this.each(function() {
            var type = this.type, tag = this.tagName.toLowerCase();
            if (tag == 'form')
                return $(':input',this).clearForm();
            if (type == 'text' || type == 'password' || tag == 'textarea' || type == 'number'
                || type == 'date' || type == 'month' || type == 'week' || type == 'time'
                || type == 'datetime' || type == 'datetime-local' || type == 'email'
                || type == 'search' || type == 'tel' || type == 'url')
                this.value = '';
            else if (type == 'checkbox' || type == 'radio')
                this.checked = false;
            else if (tag == 'select')
                this.selectedIndex = -1;
        });
    };

    /*********************************************************
     * ERROR HANDLING
     *********************************************************/

    /**
     * Display a server error alert box
     */
    function alertServerError() {
        if (!$('#ingman-server-error').length) {
            var div = $('<div id="ingman-server-error" class="alert alert-danger alert-dismissible" role="alert"></div>');
            var button = $('<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>');
            var message = $('<p><strong>Internal server error!</strong> The action could not be completed.</p>');
            div.append(button);
            div.append(message);
            var b = $(document.body);
            var container = b.find('.container').first();
            container.prepend(div);
            $('body').scrollTop(0);
        }
    }

    /**
     * Clear error messages in .can-have-error div's
     */
    function removeErrorMessages() {
        var err = $(document.body).find('.can-have-error');
        for (var i = 0; i < err.length; i++) {
            err[i].classList.remove('has-error');
            var m = $(err[i]).find('.error-msg');
            m.remove();
        }
    }

    /*********************************************************
     * AJAX HELPER FUNCTIONS
     *********************************************************/

    /**
     * Submit a form using jquery ajax
     *
     * @param form              - The form containing the data to submit
     * @param method            - GET or PUT
     * @param url               - The (sub)url to call
     * @param successCallback   - Function to call on success
     * @param errorCallback     - Function to call on error.
     */
    function ajaxSubmit(form, method, url, successCallback, errorCallback) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: method,
            url: URL_ROOT + url,
            data: $(form).serialize(),
            success: successCallback,
            error: function(data) {
                var statusCode = data.statusCode().status;
                var errors = data.responseJSON;
                errorCallback(statusCode, errors);
            }
        });
    }

    /**
     * Delete a db element using jquery ajax
     *
     * @param url               - The (sub)url that handles delete for this element
     * @param successCallback   - Function to call on succes
     * @param errorCallback     - Function to call on error
     */
    function ajaxDelete(url, successCallback, errorCallback) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'DELETE',
            url: URL_ROOT + url,
            success: successCallback,
            error: function(data) {
                var statusCode = data.statusCode().status;
                var errors = data.responseJSON;
                errorCallback(statusCode, errors);
            }
        });
    }

    /**
     * Send a get request via ajax
     *
     * @param url
     * @param successCallback
     * @param errorCallback
     */
    function ajaxGet(url, successCallback, errorCallback) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'GET',
            url: URL_ROOT + url,
            success: successCallback,
            error: function(data) {
                var statusCode = data.statusCode().status;
                var errors = data.responseJSON;
                errorCallback(statusCode, errors);
            }
        });
    }

    /*********************************************************
     * ADD EVENT HANDLERS
     *********************************************************/

    /**
     * Add handlers for the add ingredients submit events
     */
    $('.ingredient-edit-form').submit(addIngredient);

    /**
     * Add handler for tab change
     */
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
        switch(e.target) {
            case(document.getElementById('ingman-fermentables-tab')):
                updateTable('grains');
                updateTable('maltextracts');
                updateTable('sugars');
                updateTable('fermentables');
                updateTable('graintypes');
                updateTable('grainclasses');
                break;
            case(document.getElementById('ingman-hops-tab')):
                updateTable('hops');
                break;
            case(document.getElementById('ingman-yeasts-tab')):
                updateTable('yeasts');
                updateTable('yeastclasses');
                break;
            case(document.getElementById('ingman-finings-tab')):
                updateTable('finings');
                break;
            case(document.getElementById('ingman-watertreatments-tab')):
                updateTable('acids');
                updateTable('watertreatments');
                updateTable('salts');
                updateTable('ions');
                break;
            case(document.getElementById('ingman-vendors-tab')):
                updateTable('vendors');
                break;
        }
    });

    /**
     * Add handler for modal show
     */
    //$('.modal').on('show.bs.modal', populateSelects);
    $('.ingman-add-ingredient').click(function() {
        var modal = $(document).find(this.dataset.target);
        populateSelects(modal);
    });

    /**
     * Add handler for modal hide
     */
    $('.modal').on('hidden.bs.modal', function (e) {
        resetDynamicElements();
        removeErrorMessages();
        $(e.target).find('form').clearForm();
    });

    /**
     * Runs on document load. If no tab is active, activate first tab.
     */
    (function init(){
        if ($('.tab').find('li.active').length == 0) {
            $('#ingman-tabs a:first').tab('show');
        }
    })();
});