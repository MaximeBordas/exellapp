$(document).ready(function () {
    $( "#exellbundle_bien_departement").autocomplete({
        source: "{{ path('departement_autocomplete') }}",
        minLength: 2,
        select: function( event, ui ) {
            $(this).val(ui.item.label);
            $(this).val(ui.item.value);
            debugger;
            return false;
        },
        change: function( event, ui ) {
            $( "#exellbundle_bien_departement" ).val( ui.item? ui.item.value : 0 );
        }
    });
});
