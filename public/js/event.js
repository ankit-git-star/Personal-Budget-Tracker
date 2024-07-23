
function fix_body(){
      bodyOffsetY = window.pageYOffset;
      var $body = $('body')
      $body.css({
               'overflow': 'hidden',
       });
}

function remove_body_fix(){
   var $body = $('body'), $win = $(window);
   $body.css({
            'overflow': 'auto',
    });
    bodyOffsetY = window.pageYOffset;
   $win.scrollTop(bodyOffsetY);
}


$(document).on('click', '.colose_custom_popup ', function(e){
   $('#custom_popup').remove();
    $('.header-main').removeClass('blur-bg');
     $('.dashborad-main').removeClass('blur-bg');
   remove_body_fix();
});

$(document).on('click','.colose_custom_refferal_popup', function(e){
   $('#custom_refferal_popup').remove();

   remove_body_fix();
});

$(document).on('click','.colose_custom_refferal_view_popup', function(e){
   $('#custom_refferal_view_popup').remove();

   remove_body_fix();
});

$(document).on('click','.colose_custom_refer_list_popup', function(e){
   $('#custom_refer_list_popup').remove();

   remove_body_fix();
});

/*$(document).ready(function (){
   $(".resume_click_check").on('click', function (e) {
      alert('Hii');
      elem = $(this);
      var id = elem.attr('data-id');
      console.log(id)
   });

});*/
// here resume popup
$(document).ready(function () {

   $(".view-resume-upload-popup").on('click',function (e) {
      e.preventDefault();
      var csrfToken = $('meta[name="csrf-token"]').attr('content');
      var elem = $(this);
      $('#custom_popup').remove();
      var id = elem.attr("data-id");
      const formData = new FormData();
      formData.append('id', id);
      formData.append('_token', csrfToken);
       if(id){
         $.ajax({
         type: "POST",
         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
         url: "resume-upload-popup",
         "dataType": "json",
         "contentType": 'application/json; charset=utf-8',
         data:formData,
         processData: false, 
         contentType: false,
         success: function(data){
            //obj = JSON.parse(data);
            console.log(data);
            if(data.body !== undefined){
               $('#tbl').append(data.body);
               //$('.header-main').addClass('blur-bg');
               //$('.dashborad-main').addClass('blur-bg');
            }else{
               alert('Something wrong. Try again later.');
             }

         }

         });   
       }
   

   });

});

// here refferal popup form

$(document).ready(function () {

   $(".view-refferal-form-popup").on('click', function (e) {
      e.preventDefault();

      var csrfToken = $('meta[name="csrf-token"]').attr('content');
      var elem = $(this);
      $('#custom_refferal_popup').remove();
      var id = elem.attr("data-id");
      const formData = new FormData();
      formData.append('id', id);
      formData.append('_token', csrfToken);
       if(id){
         $.ajax({
         type: "POST",
         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
         url: "referral-popup-form",
         "dataType": "json",
         "contentType": 'application/json; charset=utf-8',
         data:formData,
         processData: false, 
         contentType: false,
         success: function(data){
            //obj = JSON.parse(data);
            console.log(data);
            if(data.body !== undefined){
               $('#tbl').append(data.body);
               //$('.header-main').addClass('blur-bg');
               //$('.dashborad-main').addClass('blur-bg');
            }else{
               alert('Something wrong. Try again later.');
             }

         }

         });   
       }
   

   });

});

//here employer status update

$(document).on('change', '#employer_status', function(e){ 
   var csrfToken = $('meta[name="csrf-token"]').attr('content');
   var id = $(this).attr('data-id');
   var status = $(this).val();
   const formData = new FormData();
   formData.append('_token', csrfToken);
   formData.append('empId', id);
   formData.append('status', status);

   if(id && status){

      $.ajax({
         type: "POST",
         headers: {'X-CSRF-TOKEN': csrfToken},
         url: "update-employer-status",
         "dataType": "json",
         "contentType": 'application/json; charset=utf-8',
         data: formData,
         processData: false, 
         contentType: false,
         success : function (response) {
            if (response.success){
              location.reload();      
            }
         }
      });

   }

});

// here job post status update

$(document).on('change', '#job-post-status', function(e){ 
   var csrfToken = $('meta[name="csrf-token"]').attr('content');
   var id = $(this).attr('data-id');
   var status = $(this).val();
   const formData = new FormData();
   formData.append('_token', csrfToken);
   formData.append('jobPostId', id);
   formData.append('status', status);

   if(id && status){

      $.ajax({
         type: "POST",
         headers: {'X-CSRF-TOKEN': csrfToken},
         url: "update-job-post-status",
         "dataType": "json",
         "contentType": 'application/json; charset=utf-8',
         data: formData,
         processData: false, 
         contentType: false,
         success : function (response) {
            if (response.success){
              location.reload();      
            }
         }
      });

   }

});

// Here candidate verification status update

$(document).on('change', '#candidate-verification', function(e){ 
   var csrfToken = $('meta[name="csrf-token"]').attr('content');
   var id = $(this).attr('data-id');
   var status = $(this).val();
   const formData = new FormData();
   formData.append('_token', csrfToken);
   formData.append('cid', id);
   formData.append('status', status);

   if(id && status){

      $.ajax({
         type: "POST",
         headers: {'X-CSRF-TOKEN': csrfToken},
         url: "update-candidate-verification",
         "dataType": "json",
         "contentType": 'application/json; charset=utf-8',
         data: formData,
         processData: false, 
         contentType: false,
         success : function (response) {
            if (response.success){
              location.reload();      
            }
         }
      });

   }

});

// Here view refferal popup

$(document).ready(function () {

   $(".view-refferal-popup").on('click', function (e) {
      e.preventDefault();
      var csrfToken = $('meta[name="csrf-token"]').attr('content');
      var elem = $(this);
      $('#custom_refferal_popup').remove();
      var id = elem.attr("view-id");
      const formData = new FormData();
      formData.append('id', id);
      formData.append('_token', csrfToken);
       if(id){
         $.ajax({
         type: "POST",
         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
         url: "view-refferal-list",
         "dataType": "json",
         "contentType": 'application/json; charset=utf-8',
         data:formData,
         processData: false, 
         contentType: false,
         success: function(data){
            //obj = JSON.parse(data);
            console.log(data);
            if(data.body !== undefined){
               $('#referraltbl').append(data.body);
               //$('.header-main').addClass('blur-bg');
               //$('.dashborad-main').addClass('blur-bg');
            }else{
               alert('Something wrong. Try again later.');
             }

         }

         });   
       }
   

   });

});

// Here candidates refer popup

$(document).ready(function () {

   $(".candidate-reffer").on('click', function (e) {
      e.preventDefault();
      var csrfToken = $('meta[name="csrf-token"]').attr('content');
      var elem = $(this);
      $('#custom_refer_list_popup').remove();
      var id = elem.attr("data-id");
      const formData = new FormData();
      formData.append('id', id);
      formData.append('_token', csrfToken);
       if(id){
         $.ajax({
         type: "POST",
         headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
         url: "view-candidate-list-refer",
         "dataType": "json",
         "contentType": 'application/json; charset=utf-8',
         data:formData,
         processData: false, 
         contentType: false,
         success: function(data){
            //obj = JSON.parse(data);
            if(data.body !== undefined){
               $('#referCatbl').append(data.body);
               //$('.header-main').addClass('blur-bg');
               //$('.dashborad-main').addClass('blur-bg');
            }else{
               alert('Something wrong. Try again later.');
             }

         }

         });   
       }
   

   });

});

// here candidate refer

$(document).on('click', '.refer-candidate', function(e){ 
   var csrfToken = $('meta[name="csrf-token"]').attr('content');
   var id = $(this).attr('data-id');
   var cid = [];
       $(".checkboxes:checked").each(function() {
           cid.push(this.value);
       });
   const formData = new FormData();
   formData.append('_token', csrfToken);
   formData.append('empId', id);
   formData.append('cid[]', cid);

   if(id && cid){

      $.ajax({
         type: "POST",
         headers: {'X-CSRF-TOKEN': csrfToken},
         url: "refer",
         "dataType": "json",
         "contentType": 'application/json; charset=utf-8',
         data: formData,
         processData: false, 
         contentType: false,
         success : function (response) {
            if (response.success){
              location.reload();      
            }
         }
      });

   }

});

