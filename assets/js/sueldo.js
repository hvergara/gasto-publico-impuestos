
var Sueldos = {};

(function(exports) {

  var TRAMOS_IMPONIBLE = {
    '1': { low: 0,    high: 13.5,     factor: 0,    discount: 0 },
    '2': { low: 13.5, high: 30,       factor: 0.05, discount: 0.675 },
    '3': { low: 30,   high: 50,       factor: 0.1,  discount: 2.175 },
    '4': { low: 50,   high: 70,       factor: 0.15, discount: 4.675 },
    '5': { low: 70 ,  high: 90,       factor: 0.25, discount: 11.675 },
    '6': { low: 90,   high: 120,      factor: 0.32, discount: 17.975 },
    '7': { low: 120,  high: 150,      factor: 0.37, discount: 23.975 },
    '8': { low: 150,  high: Infinity, factor: 0.4,  discount: 28.975 },
  };
  
  var TRAMOS_LIQUIDO = {
    '1': { low: 0,      high: 10.92,    factor: 0,    discount: 0 },
    '2': { low: 10.92,  high: 23.73,    factor: 0.05, discount: 0.675 },
    '3': { low: 23.73,  high: 40.58,    factor: 0.1,  discount: 2.175 },
    '4': { low: 40.58,  high: 57.91,    factor: 0.15, discount: 4.675 },
    '5': { low: 57.91,  high: 73.65,    factor: 0.25, discount: 11.675 },
    '6': { low: 73.65,  high: 94.56,    factor: 0.32, discount: 17.975 },
    '7': { low: 94.56,  high: 113.83,   factor: 0.37, discount: 23.975 },
    '8': { low: 113.83, high: Infinity, factor: 0.4,  discount: 28.975 },
  };
  
  var VALOR_UTM = 39700
    , VALOR_UF  = 22830;
  
  var TOPE_SOCIAL   = 67.4  * VALOR_UF
    , TOPE_CESANTIA = 101.1 * VALOR_UF;
  
  function Liquidacion (imponible) {
    
    var sueldo_imponible = Math.ceil(imponible);
    
    var desc_salud    = 0.07  * Math.min(TOPE_SOCIAL, sueldo_imponible);
    var desc_pension  = 0.115 * Math.min(TOPE_SOCIAL, sueldo_imponible);
    var desc_cesantia = 0.006 * Math.min(TOPE_CESANTIA, sueldo_imponible);
    var descuentos    = Math.ceil(desc_salud + desc_pension + desc_cesantia);
    
    
    var index = getTramo(sueldo_imponible - descuentos, TRAMOS_IMPONIBLE);
    var tramo = TRAMOS_IMPONIBLE[index];
    
    var impuestos = (sueldo_imponible - descuentos) * tramo.factor - tramo.discount * VALOR_UTM;
    impuestos = Math.ceil(impuestos);
    
    
    
    
    var liquidacion = {
    
      descuentos: {
        salud:     Math.ceil(desc_salud),
        pension:   Math.ceil(desc_pension),
        cesantia:  Math.ceil(desc_cesantia),
        impuestos: impuestos
      },
      
      liquido: Math.ceil(sueldo_imponible - descuentos - impuestos)
    }
    
    return liquidacion
  }


  function calcularBruto (liquido) {
    var imponible;
    
    var index = getTramo(liquido, TRAMOS_LIQUIDO);
    var tramo = TRAMOS_LIQUIDO[index];
  
    var SOCIAL   = TOPE_SOCIAL * 0.185
      , CESANTIA = TOPE_CESANTIA * 0.006;

    
    var TAX_DISCOUNT = tramo.discount * VALOR_UTM;
    
    if(liquido < Liquidacion(TOPE_SOCIAL).liquido) {
      
      imponible = (liquido - TAX_DISCOUNT) / (0.815 - 0.006 - 0.815 * tramo.factor)
  
    } else if (liquido < Liquidacion(TOPE_CESANTIA).liquido) {
    
      imponible = (liquido - TAX_DISCOUNT - SOCIAL * (tramo.factor - 1)) / (1 - 0.006 - tramo.factor - 0.006 * tramo.factor);
    
    } else {
      
      imponible = (liquido - TAX_DISCOUNT - SOCIAL * (tramo.factor - 1) - CESANTIA * (tramo.factor - 1)) / (1 - tramo.factor);
      
    }
    
    return Math.ceil(imponible)
  }


  function getTramo (value, scale) {
    var utms = value / VALOR_UTM;
    
    for (var idx in scale) {
      if (utms >= scale[idx].low && utms < scale[idx].high) {
        return idx;
      }
    } 
  }
  
  exports.Liquidacion   = Liquidacion;
  exports.calcularBruto = calcularBruto;

})(Sueldos);
