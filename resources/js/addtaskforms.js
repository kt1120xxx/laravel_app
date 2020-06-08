var int = 100;
$(function(){
    $('#addForm').click(function(){
      int++;
      $('#memoForm').append('<br><input class="task-memo" name=memo' + int +'></input>');
    });
  });

var english_num = 100;
$(function(){
    $('#addEnglishButton').click(function(){
      english_num++;
      $('#addEnglishForm').append('<div class="copy-form"><label for="english">english  </label><input class="english_form" name=english' + english_num +'></input></div>'
      +'<div class="copy-form"><label for="japanese">japanese</label><input class="english_form" name=japanese' + english_num +'></input></div>');
    });
  });