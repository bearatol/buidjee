$(function(){
   $(".task_list textarea", document).on('change', function(){
      ajax_post_edit($(this).val(), $(this).data("id"), 'edit_textarea');
   });
   $(".task_list select", document).on('change', function(){
      ajax_post_edit($(this).val(), $(this).data("id"), 'edit_select');
   });
});
function ajax_post_edit(value, id, action){
   $.post(
      "/", 
      { 
         'VALUE': value, 
         'ID': id, 
         'ACTION': action 
      }
   );
}