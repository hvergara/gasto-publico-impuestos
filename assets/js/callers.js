
	$(".clean").each(function(){
		// TODO to native js		
		var value = $(this).val();
		$(this).focusin(function(){if($(this).val() == value){$(this).val("");};});
		$(this).focusout(function(){if($(this).val() == ''){$(this).val(value);};});
	});
	
	
  function money(value) {
    var str = "" + Math.ceil(value);
    str = str.split('').reverse().join('').replace(/\d{3}/g, function(e) { return e + '.' }).split('').reverse().join('').replace(/^\./, '')
    return '$' + str;
  
  }
	
	
	var messages = {
	 'help-afp': 'Equivale al 10% de tu renta imponible, más la comisión de cada AFP. Tiene un tope imponible de 66 UF',
	 'help-isapre': 'Equivale al 7% de tu renta imponible. Tiene un tope imponible de 66 UF',
	 'help-seguro': 'El Seguro de Cesantía equivale al 0.6% de tu renta imponible. Tiene un tope imponible de 99 UF',
	 'help-impuesto': 'Se calcula basado en el Imponible menos los descuentos, y contra una tabla de factores y descuentos tributarios.'
	}
	
	
	if(jQuery.fn.tooltipsy) {
	
  	$(".tooltip").tooltipsy({
      offset: [0, -10],
  	
      content: function ($el, $tip) {
        var rel = $el.attr('rel');
        return messages[rel];
      },
      
      css: {
          'padding': '10px',
          'max-width': '200px',
          'color': 'white',
          'background-color': 'rgba(0, 0, 0, 0.5)',
          'border-radius': '10px',
          'text-shadow': 'none'
      }
    })
	
	}
	
	
	
	
	
	
	
	$('nav.buttons a').click(function() {
	
    var rel = $(this).attr('rel');
	
    $('section.tabs').hide();
    $('section#' + rel).show();
	
	 return false;
	});
	
	
  function doCalc(value) {
    $('#salary').val(value);
    $('#form_id').submit();
    return false;
  }
	
	
//	$('#salary').on('keypress', function() {
//    this.value = money(this.value.replace(/[\d]+/g, ''));
//	});