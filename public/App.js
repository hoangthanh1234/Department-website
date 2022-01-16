//-----------------------------------------------------------------------------------------AJAX hien thi------------------------------------------------

$(document).ready(function() {
		/* ajax hienthi*/
		$("a.diamondToggle").click(function(){      
			if($(this).attr("rel")==0){
				$.get('set_admin/ajax/hienthi/'+$(this).attr("data-val0")+'/'+$(this).attr("data-val2")+'/'+$(this).attr("data-val3")+'/1');
				$(this).addClass("diamondToggleOff");
				$(this).attr("rel",1);
			}else{					
				$.get('set_admin/ajax/hienthi/'+$(this).attr("data-val0")+'/'+$(this).attr("data-val2")+'/'+$(this).attr("data-val3")+'/0');
				$(this).removeClass("diamondToggleOff");
				$(this).attr("rel",0);
			}
		});

    $("a.diamondTogglebomon").click(function(){      
      if($(this).attr("rel")==0){
        $.get('set_bomon/ajax/hienthi/'+$(this).attr("data-val0")+'/'+$(this).attr("data-val2")+'/'+$(this).attr("data-val3")+'/1');
        $(this).addClass("diamondToggleOffbomon");
        $(this).attr("rel",1);
      }else{          
        $.get('set_bomon/ajax/hienthi/'+$(this).attr("data-val0")+'/'+$(this).attr("data-val2")+'/'+$(this).attr("data-val3")+'/0');
        $(this).removeClass("diamondToggleOffbomon");
        $(this).attr("rel",0);
      }
    });

		$('.update_stt').change(function(){     
			$.get('set_admin/ajax/stt/'+$(this).attr("data-val0")+'/'+$(this).attr("data-val1")+'/'+$(this).val());
		});

    $('.update_sttgv').change(function(){     
      $.get('set_giangvien/ajax/stt/'+$(this).attr("data-val0")+'/'+$(this).attr("data-val1")+'/'+$(this).val());
    });

    $('.update_sttbm').change(function(){     
      $.get('set_bomon/ajax/stt/'+$(this).attr("data-val0")+'/'+$(this).attr("data-val1")+'/'+$(this).val());
    });





	});

// ---------------------------------------------------------------------------------------------------datatable----------------------------------------


 $(function () {

   var table2=$('#example2').DataTable({

   	  'paging'      : true,
      'lengthChange': true,      
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,  
      'autoWidth': false,
       "pagingType": "full_numbers",
       "lengthMenu": [[10, 25, 50,100,150,200, -1], [10, 25, 50,100,150,200, "tât cả"]],  
        language: {
        "lengthMenu": "Hiển thị _MENU_ mẫu tin trên bảng",
        "info": "Hiển thị  _PAGE_ trong _PAGES_ trang",
        "infoEmpty": "Không có mẫu tin nào",
        "search": "Tìm kiếm:",
        paginate: {
            first:    'Trang đầu',
            previous: '«',
            next:     '»',
            last:     'Trang cuối',
        }},   
       initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                  .appendTo( $(column.footer()).empty() )
                  .on( 'change', function () {
                  var val = $.fn.dataTable.util.escapeRegex(
                  $(this).val()
              );

              column
                .search( val ? '^'+val+'$' : '', true, false )
                .draw();
              });

              column.data().unique().sort().each( function (d,j) {
                  select.append( '<option value="'+d+'">'+d+'</option>' )
              });
          });
      }   
   });

   var table25=$('.example2').DataTable({

      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : false,
      'info'        : true,  
       "pagingType": "full_numbers",
       "lengthMenu": [[10, 25, 50,100,150,200, -1], [10, 25, 50,100,150,200, "tât cả"]],  
        language: {
        "lengthMenu": "Hiển thị _MENU_ mẫu tin trên bảng",
        "info": "Hiển thị  _PAGE_ trong _PAGES_ trang",
        "infoEmpty": "Không có mẫu tin nào",
        "search": "Tìm kiếm:",
        paginate: {
            first:    'Trang đầu',
            previous: '«',
            next:     '»',
            last:     'Trang cuối',
        }},   
       initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                  .appendTo( $(column.footer()).empty() )
                  .on( 'change', function () {
                  var val = $.fn.dataTable.util.escapeRegex(
                  $(this).val()
              );

              column
                .search( val ? '^'+val+'$' : '', true, false )
                .draw();
              });

              column.data().unique().sort().each( function (d,j) {
                  select.append( '<option value="'+d+'">'+d+'</option>' )
              });
          });
      }   
   });

  var table=$('#example3').DataTable({

                  'paging'      : true,
                  'lengthChange': false,
                  'searching'   : true,
                  'ordering'    : true,
                   "autoWidth": false,
                  'info'        : false,  
                   "pagingType": "full_numbers",
                   "lengthMenu": [[10, 25, 50,100,150,200, -1], [10, 25, 50,100,150,200, "All"]], 
                   "scrollX": false,

                    initComplete: function () {
                        this.api().columns().every( function () {
                            var column = this;
                            var select = $('<select><option value=""></option></select>')
                                .appendTo( $(column.footer()).empty() )
                                .on( 'change', function () {
                                    var val = $.fn.dataTable.util.escapeRegex(
                                        $(this).val()
                                    );

                                    column
                                        .search( val ? '^'+val+'$' : '', true, false )
                                        .draw();
                                } );

             

                            column.data().unique().sort().each( function ( d, j ) {
                                select.append( '<option value="'+d+'">'+d+'</option>' )
                            } );
                        } );
                    }  
                });

    var table4=$('.example4').DataTable({

      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,  
       "pagingType": "full_numbers",
       "lengthMenu": [[10, 25, 50,100,150,200, -1], [10, 25, 50,100,150,200, "All"]],     
       initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                  .appendTo( $(column.footer()).empty() )
                  .on( 'change', function () {
                  var val = $.fn.dataTable.util.escapeRegex(
                  $(this).val()
              );

              column
                .search( val ? '^'+val+'$' : '', true, false )
                .draw();
              });

              column.data().unique().sort().each( function ( d, j ) {
                  select.append( '<option value="'+d+'">'+d+'</option>' )
              });
          });
      }   
   });





      table.columns.adjust().draw();
      table2.columns.adjust().draw();
      table25.columns.adjust().draw();
       table4.columns.adjust().draw();
  })




//-----------------------------------------------------------------------------------CKEDITTOR-----------------------------------------------------------------



 var editor = CKEDITOR.replace('tiny',{     
      skin: 'kama',      
      filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?Type=Images',
      filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?Type=Flash',
      filebrowserLinkBrowseUrl: 'ckfinder/ckfinder.html',
      filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
      filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
      filebrowserLinkUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload',

 }); 


  var editor = CKEDITOR.replace('tiny1', { 
    skin: 'kama',    
    filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?Type=Images',
    filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?Type=Flash',
    filebrowserLinkBrowseUrl: 'ckfinder/ckfinder.html',
    filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
    filebrowserLinkUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload',
  });  

  var editor = CKEDITOR.replace('tiny2', {      
    skin: 'kama', 
    filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?Type=Images',
    filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?Type=Flash',
    filebrowserLinkBrowseUrl: 'ckfinder/ckfinder.html',
    filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
    filebrowserLinkUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload',
  }); 


  var editor = CKEDITOR.replace('tiny3', {       
    skin: 'kama',  
    filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?Type=Images',
    filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?Type=Flash',
    filebrowserLinkBrowseUrl: 'ckfinder/ckfinder.html',
    filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
    filebrowserLinkUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload',
  }); 

  var editor = CKEDITOR.replace('tiny4', {          
    skin: 'kama',
    filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?Type=Images',
    filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?Type=Flash',
    filebrowserLinkBrowseUrl: 'ckfinder/ckfinder.html',
    filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
    filebrowserLinkUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload',
  }); 

   var editor = CKEDITOR.replace('tiny5', {
    skin: 'kama',   
    filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?Type=Images',
    filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?Type=Flash',
    filebrowserLinkBrowseUrl: 'ckfinder/ckfinder.html',
    filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
    filebrowserLinkUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload',
  }); 

  var editor = CKEDITOR.replace('tiny6', {
    skin: 'kama',   
    filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?Type=Images',
    filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?Type=Flash',
    filebrowserLinkBrowseUrl: 'ckfinder/ckfinder.html',
    filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
    filebrowserLinkUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload',
  }); 

  var editor = CKEDITOR.replace('tiny7', {
    skin: 'kama',   
    filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?Type=Images',
    filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?Type=Flash',
    filebrowserLinkBrowseUrl: 'ckfinder/ckfinder.html',
    filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
    filebrowserLinkUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload',
  }); 

  var editor = CKEDITOR.replace('tiny8', {
    skin: 'kama',   
    filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?Type=Images',
    filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?Type=Flash',
    filebrowserLinkBrowseUrl: 'ckfinder/ckfinder.html',
    filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
    filebrowserLinkUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload',
  }); 

  var editor = CKEDITOR.replace('tiny9', {
    skin: 'kama',   
    filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?Type=Images',
    filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?Type=Flash',
    filebrowserLinkBrowseUrl: 'ckfinder/ckfinder.html',
    filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
    filebrowserLinkUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload',
  }); 

  var editor = CKEDITOR.replace('tiny10', {
    skin: 'kama',   
    filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?Type=Images',
    filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?Type=Flash',
    filebrowserLinkBrowseUrl: 'ckfinder/ckfinder.html',
    filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
    filebrowserLinkUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload',
  }); 

  var editor = CKEDITOR.replace('tiny11', {
    skin: 'kama',   
    filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?Type=Images',
    filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?Type=Flash',
    filebrowserLinkBrowseUrl: 'ckfinder/ckfinder.html',
    filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
    filebrowserLinkUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload',
  }); 

  var editor = CKEDITOR.replace('tiny12', {
    skin: 'kama',   
    filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?Type=Images',
    filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?Type=Flash',
    filebrowserLinkBrowseUrl: 'ckfinder/ckfinder.html',
    filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
    filebrowserLinkUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload',
  }); 

   var editor = CKEDITOR.replace('tiny13', {
    skin: 'kama',   
    filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?Type=Images',
    filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?Type=Flash',
    filebrowserLinkBrowseUrl: 'ckfinder/ckfinder.html',
    filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
    filebrowserLinkUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload',
  }); 


 var editor = CKEDITOR.replace('tiny14', {
    skin: 'kama',   
    filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?Type=Images',
    filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?Type=Flash',
    filebrowserLinkBrowseUrl: 'ckfinder/ckfinder.html',
    filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
    filebrowserLinkUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload',
  }); 


 var editor = CKEDITOR.replace('tiny15', {
    skin: 'kama',   
    filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?Type=Images',
    filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?Type=Flash',
    filebrowserLinkBrowseUrl: 'ckfinder/ckfinder.html',
    filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
    filebrowserLinkUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload',
  }); 


 var editor = CKEDITOR.replace('tiny16', {
    skin: 'kama',   
    filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?Type=Images',
    filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?Type=Flash',
    filebrowserLinkBrowseUrl: 'ckfinder/ckfinder.html',
    filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
    filebrowserLinkUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload',
  }); 


 var editor = CKEDITOR.replace('tiny17', {
    skin: 'kama',   
    filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?Type=Images',
    filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?Type=Flash',
    filebrowserLinkBrowseUrl: 'ckfinder/ckfinder.html',
    filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
    filebrowserLinkUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload',
  }); 


 var editor = CKEDITOR.replace('tiny18', {
    skin: 'kama',   
    filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?Type=Images',
    filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?Type=Flash',
    filebrowserLinkBrowseUrl: 'ckfinder/ckfinder.html',
    filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
    filebrowserLinkUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload',
  }); 

  var editor = CKEDITOR.replace('tiny19', {
    skin: 'kama',   
    filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?Type=Images',
    filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?Type=Flash',
    filebrowserLinkBrowseUrl: 'ckfinder/ckfinder.html',
    filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
    filebrowserLinkUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload',
  }); 


 var editor = CKEDITOR.replace('tiny20', {
    skin: 'kama',   
    filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?Type=Images',
    filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?Type=Flash',
    filebrowserLinkBrowseUrl: 'ckfinder/ckfinder.html',
    filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
    filebrowserLinkUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload',
  }); 



  //----------------------------------------------------AJAX UPLOAD ANH-------------------------------------------------------------------

  $uploadCrop = $('#upload-demo').croppie({
			    enableExif: true,
			    viewport: {
			        width: 300,
			        height: 300,
			        type: 'square'
			    },
			    boundary: {
			        width: 400,
			        height: 400
			    }
		});

		$('#upload').on('change', function () { 
				var reader = new FileReader();
			    reader.onload = function (e) {
			    $uploadCrop.croppie('bind', {
			    url: e.target.result
			    }).then(function(){
			    console.log('jQuery bind complete');
			    });
			    
			    }
			    reader.readAsDataURL(this.files[0]);
		});

//-----------------------------------------------------------------------------------AJAX ICHECK--------------------------------------------------------
$(function () { 
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })    
  })

  $(document).ready(function(){
    $('#tabs div#tab2').hide();
    $('#tabs div#tab3').hide();
    $('#tabs div#tab4').hide();
    $('#tabs div:first').show();
    $('#tabs ul li:first').addClass('active');
    
      $('#tabs ul li').click(function(){
      $('#tabs ul li').removeClass('active');
      $(this).addClass('active');

      var currentTab = $(this).attr('type');

      $('#tabs div#tab1').hide();
      $('#tabs div#tab2').hide();
      $('#tabs div#tab3').hide();
      $('#tabs div#tab4').hide();

      $(currentTab).show();
      return false;
    }); 
  });