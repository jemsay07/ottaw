function _elm(el){
  return document.getElementById(el);
}

/**-Tooltips-------------------------------------------------------------------------*/
function customTooltips(toolStatus = 'danger', toolMessage){
  let tooltips = '<div class="alert alert-' + toolStatus + ' position-fixed" style="width: auto;right: 10px;bottom: 10px;z-index:1060">' + toolMessage + '</div>';
  
  jQuery('#ottaToolTips').fadeIn('slow', function () {
      jQuery(this).append(tooltips).delay(2000).fadeOut('slow');
  });
}


/**-Number-Limiter--------------------------------------------------------------------*/
function numLimiter(par){
  let numVlimit = par.val();

  if(numVlimit.length > 4){
    let newNumLimit = numVlimit.slice(0,-1);
    par.val(newNumLimit);
  }
}