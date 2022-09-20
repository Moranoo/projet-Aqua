//interface pour commander la modale de la page cards.php

//bouton CREATE
$('.fa-folder-plus').click(function(){
   

    $.ajax({
        url : "./displayInsert.html",   
        success: function(res){
            $('.modal-body').html(res)
        }
    })
})

//bouton READ
$('.fa-eye').click(function(){
    let id = $(this).data('id')
 

    $.ajax({
        url : "./readAqua.php",
        type:'post',
        data: {key: id},
      
        success: function(res){
            $('.modal-body').html(res)
           
        }
    })
})

//bouton UPDATE DONNEES
$('.fa-pencil').click(function(){
    let id = $(this).data('id')

    $.ajax({
        url : "./displayUpdateAqua.php",
        type: 'post',
        data: {key: id},
        success: function(res){
            $('.modal-body').html(res)
        }
    })
})

//bouton UPDATE IMAGE
$('.fa-image').click(function(){
    let id = $(this).data('id')

    $.ajax({
        url : "./displayModImgAqua.php",
        type: 'post',
        data: {key: id},
        success: function(res){
            $('.modal-body').html(res)
        }
    })
})

//bouton CHRONO EAU
$('.fa-clock-rotate-left').click(function(){
    let id = $(this).data('id')

    $.ajax({
         url : "./displayChronoEau.php",
        type: 'post',
        data: {key: id},
        success: function(res){
            $('.modal-footer').html(res)
           
        }
    })
})

//bouton CHRONO FILTRE
$('.filter').click(function(){
    let id = $(this).data('id')

    $.ajax({
         url : "./displayChronoFiltre.php",
        type: 'post',
        data: {key: id},
        success: function(res){
            $('.modal-footer').html(res)
        }
    })
})
