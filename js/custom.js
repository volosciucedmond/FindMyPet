$(document).ready(function() {

    $('.deleteProductButton').click(function(e) {
        e.preventDefault();
        // preluarea id-ului fiecarui animal
        var id = $(this).val();
        // alert(id);

        //pop-up sweet alert
        swal({
                title: "Ești sigur?",
                text: "Animalul tău va fi șters din baza de date!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        method: "POST",
                        url: "code.php",
                        data: {
                            'product_id': id,
                            'deleteProductButton': true
                        },

                        success: function(response) {
                            // console.log(response);
                            if (response == 200) {
                                swal({
                                    title: "Succes!",
                                    text: "Produs șters cu succes!",
                                    icon: "success",
                                });
                                $("#products_table").load(location.href + " #products_table"); // refresh pentru a actualiza tabelul cu animale
                            } else if (response == 500) {
                                swal({
                                    title: "Eroare!",
                                    text: "Ceva nu a mers bine!",
                                    icon: "error",
                                });
                            }

                        }
                    });
                }
            });
    });
    $('.deleteCategoryButton').click(function(e) {
        e.preventDefault();
        // preluarea id-ului fiecarui animal
        var id = $(this).val();
        // alert(id);

        //pop-up sweet alert
        swal({
                title: "Ești sigur?",
                text: "Categoria va fi ștearsă din baza de date!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        method: "POST",
                        url: "code.php",
                        data: {
                            'category_id': id,
                            'deleteCategoryButton': true
                        },

                        success: function(response) {
                            // console.log(response);
                            if (response == 200) {
                                swal({
                                    title: "Succes!",
                                    text: "Categorie ștearsă cu succes!",
                                    icon: "success",
                                });
                                $("#category_table").load(location.href + " #category_table");
                            } else if (response == 500) {
                                swal({
                                    title: "Eroare!",
                                    text: "Ceva nu a mers bine!",
                                    icon: "error",
                                });
                            }

                        }
                    });
                }
            });
    });

    $('.deleteReviewButton').click(function(e) {
        e.preventDefault();
        // preluarea id-ului fiecarui animal
        var id = $(this).val();
        // alert(id);

        //pop-up sweet alert
        swal({
                title: "Ești sigur?",
                text: "Review-ul va fi șters din baza de date!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        method: "POST",
                        url: "code.php",
                        data: {
                            'review_id': id,
                            'deleteReviewButton': true
                        },

                        success: function(response) {
                            // console.log(response);
                            if (response == 200) {
                                swal({
                                    title: "Succes!",
                                    text: "Review șters cu succes!",
                                    icon: "success",
                                });
                                $("#review_table").load(location.href + " #review_table");
                            } else if (response == 500) {
                                swal({
                                    title: "Eroare!",
                                    text: "Ceva nu a mers bine!",
                                    icon: "error",
                                });
                            }

                        }
                    });
                }
            });
    });
    $('.deleteUserButton').click(function(e) {
        e.preventDefault();
        // preluarea id-ului fiecarui animal
        var id = $(this).val();
        // alert(id);

        //pop-up sweet alert
        swal({
                title: "Ești sigur?",
                text: "User-ul va fi șters din baza de date!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        method: "POST",
                        url: "code.php",
                        data: {
                            'userG_id': id,
                            'deleteUserButton': true
                        },

                        success: function(response) {
                            // console.log(response);
                            if (response == 200) {
                                swal({
                                    title: "Succes!",
                                    text: "User șters cu succes!",
                                    icon: "success",
                                });
                                $("#user_table").load(location.href + " #user_table");
                            } else if (response == 500) {
                                swal({
                                    title: "Eroare!",
                                    text: "Ceva nu a mers bine!",
                                    icon: "error",
                                });
                            }

                        }
                    });
                }
            });
    });
    $('.deleteMessageButton').click(function(e) {
        e.preventDefault();
        // preluarea id-ului fiecarui mesaj
        var id = $(this).val();
        // alert(id);

        //pop-up sweet alert
        swal({
                title: "Ești sigur?",
                text: "Mesajul va fi șters din baza de date!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        method: "POST",
                        url: "code.php",
                        data: {
                            'messages_id': id,
                            'deleteMessageButton': true
                        },

                        success: function(response) {
                            // console.log(response);
                            if (response == 200) {
                                swal({
                                    title: "Succes!",
                                    text: "Mesaj șters cu succes!",
                                    icon: "success",
                                });
                                $("#message_table").load(location.href + " #message_table");
                            } else if (response == 500) {
                                swal({
                                    title: "Eroare!",
                                    text: "Ceva nu a mers bine!",
                                    icon: "error",
                                });
                            }

                        }
                    });
                }
            });
    });


});