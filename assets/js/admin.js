$(document).ready(function() {

  // Menu listing script 
  var ns = $( 'ol.sortable' ).nestedSortable({
    forcePlaceholderSize: true,
    handle: 'div',
    helper: 'clone',
    items: 'li',
    opacity: .6,
    placeholder: 'placeholder',
    revert: 250,
    tabSize: 25,
    tolerance: 'pointer',
    toleranceElement: '> div',
    maxLevels: 4,
    isTree: true,
    expandOnHover: 700,
    startCollapsed: false
  });
  $( 'ol.sortable' ).disableSelection();

  var Counter = function() {
    var cJ = {};
    this.getCount = function(parent) {
      var count;
      if(cJ.hasOwnProperty(parent)) {
        count = cJ[parent];
      } else {
        cJ[parent] = count = 1;
      }
      cJ[parent] += 1;
      return count;
    }
  };


  var getJson = function(cb) {
    var counter = new Counter();
    var json = {'list': []};
    $('li > div[data-menu-id]', 'ol.sortable').each(function(i, item) {
      var jItem = {'id': $(item).data('menu-id')};
      var self = $(item).parent();
      if($('ol li > div[data-menu-id]', self).size() > 0) {
        jItem['type'] = 'PARENT';
      }
      if($(self).parents('ol').size() > 1) {
        var parent = $('div[data-menu-id]:first', $(self).parents('li:first')).data('menu-id');
        jItem['parent'] = parent;
        jItem['index']  = counter.getCount(parent);
      } else {
        jItem['parent'] = 0;
        jItem['index']  = counter.getCount('list');
      }
      json['list'].push(jItem);
    }).promise().done(function() {
      cb(json);
    });
  };

  $( '#menu-update' ).on('click', function() {
    getJson(function(json) {
      $.post($("#site-url").data('url') + "/admin/menu_update", json).then(function(res) {
        alert(res);
      });
    });
  });

  // Menu form script
  var refreshView = function() {
    var val = $( ':input', '#type-field' ).val();
    if(typeof val != 'undefined') {
      $( '.conditional' ).hide();
      $( '#' +  val.toLowerCase() + '-field' ).removeClass('hide').show();
    }
  }
  $( ':input', '#type-field' ).on('change', refreshView);
  refreshView();

  // Page form script
  var initCkEditor = function() {
    if(typeof CKEDITOR == "undefined") setTimeout(initCkEditor, 100);
    else {
      if($("#l1").size() > 0) CKEDITOR.replace( 'l1' );
      if($("#l2").size() > 0) CKEDITOR.replace( 'l2' );
    }
  }
  initCkEditor();

});
