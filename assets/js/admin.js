
$(document).ready(function() {


  // General purpose script
  var url = function(str) {
    return $("#site-url").data('url') + str;
  }


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
      $.post(url("/admin/menu_update"), json).then(function(res) {
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

  // Lang scripts

  var getInput = function(name, value) {
    if(typeof value == "undefined") value = '';
    return $("<td/>", {
      "data-lang-field": name
    }).append($("<input/>", {
      "class": "form-control",
      "name": name,
      "value": value
    }))
  }

  var generateLangForm = function(target, id) {
    var line = $("<tr/>", {"data-target": typeof id != "undefined"? id: "new"});
    $(line).append(getInput('key', $("[data-lang-field=key]", target).text()));
    $(line).append(getInput('value_l1', $("[data-lang-field=value_l1]", target).text()));
    $(line).append(getInput('value_l2', $("[data-lang-field=value_l2]", target).text()));
    $(line).append($("<td/>", {"data-action":""}).append($("<button/>", {"class": "btn btn-success save", "text": "Save"})));
    $(target).before(line);
    $("[data-lang-field=key] input", line).focus();
    if(typeof id != "undefined") $(target).hide();
  }
  var generateLangRow = function(target, id) {
    $(target).removeAttr('data-target');
    $(target).attr('data-lang-id', id);
    $("[data-lang-field]", target).each(function(i, item) {
      $(item).html($("input", item).val());
    });
    $("[data-action]", target).empty()
      .append($("<button/>", {'class': "btn btn-default edit", 'text': "Edit"}))
      .append("&nbsp;")
      .append($("<button/>", {'class': "btn btn-default delete", 'text': "Delete"}));
  }

  var getTarget = function(ele) {
   return $(ele).parents('tr:first');
  }

  $( '#lang-list' ).delegate('.save ', 'click', function() {
    var target = getTarget(this);
    var id = $(target).data('target');
    var json = {};
    var callback = function(){};

    $("[data-lang-field]", target).each(function(i, item) {
      json[$(item).data('lang-field')] = $("input", item).val();
    }).promise().done(function(){
      if(id == "new") {
        // For new entry
        id = '';
        callback = function (res) {
          res = eval("("+res+")");
          generateLangRow(target, res.id);
        }
      } else {
        // For edit entry
        callback = function(res) {
          $("[data-lang-id="+id+"]").remove();
          generateLangRow(target, id);
        }
      }
      // callback();
      $.post(url("/admin/lang_save/"+id), json).then(callback);
    })
  });
  $( '#lang-list' ).delegate('.add', 'click', function() {
    var target = getTarget(this);
    generateLangForm(target);
  });
  $( '#lang-list' ).delegate('.edit', 'click', function() {
    var target = getTarget(this);
    generateLangForm(target, $(target).data('lang-id'));
  });
  $( '#lang-list' ).delegate('.delete', 'click', function() {
    if(confirm("Are you sure?")) {
      var self = this;
      $.get(url('/admin/lang_del/' + $(self).data('lang-id'))).then(function() {
        $(self).parents('tr:first').remove();
      });
    };
  });
  $( '#lang-list' ).delegate('.delete', 'mouseenter', function() {
    $(this).removeClass('btn-default').addClass('btn-danger');
  });
  $( '#lang-list' ).delegate('.delete', 'mouseleave', function() {
    $(this).removeClass('btn-danger').addClass('btn-default');
  });

});
