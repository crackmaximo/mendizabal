    // keep track of how many email fields have been rendered

    var contador = '{{ form|length }}';

    jQuery(document).ready(function() {

        jQuery('#agregar-campo').click(function(e) {

            e.preventDefault();

 

            var listaCampos = jQuery('#lista-campos');

 

            // grab the prototype template

            var newWidget = listaCampos.attr('data-prototype');

 

            // replace the "__name__" used in the id and name of the prototype

            // with a number that's unique to your emails

            // end name attribute looks like name="contact[emails][2]"

            newWidget = newWidget.replace(/__name__/g, contador);

            contador++;

 

            // create a new list element and add it to the list

            var newLi = jQuery('<div></div><br>').html(newWidget);

            newLi.appendTo(listaCampos);

 

        });

    });



