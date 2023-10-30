<?php
session_start();
include('../DAWM/function/myfunctions.php');
include('../DAWM/config/dbcon.php');

if (isset($_POST['add_category_btn'])) {
    $nume = $_POST['nume'];
    $descriere = $_POST['descriere'];
    $image = $_FILES['image']['name'];

    $path = "../DAWM/uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION); // extensia imagine
    $filename = time() . '.' . $image_ext; //creare nume

    $category_query = "INSERT INTO categories(nume, descriere, image) VALUES ('$nume', '$descriere', '$filename')";

    $category_query_run = mysqli_query($con, $category_query);

    if ($category_query_run) {
        move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $filename);
        redirect("adaugaCategorie.php", "Categorie adăugată cu succes!");
    } else {
        redirect("adaugaCategorie.php", "Ceva nu a mers bine!");
    }
} else if (isset($_POST['editCategoryButton'])) {
    $category_id = $_POST['category_id'];
    $nume = $_POST['nume'];
    $descriere = $_POST['descriere'];

    // $new_image = $_FILES['image']['name'];
    // $old_image = $_POST['old_image'];

    // if ($new_image != "") {
    //     // $update_filename = $new_image;
    //     $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    //     $update_filename = time() . '.' . $image_ext;
    // } else {
    //     $update_filename = $old_image;
    // }
    // $path = "../DAWM/uploads";
    // $update_query = "UPDATE categories SET nume='$nume', descriere='$descriere', image='$update_filename' WHERE id ='$category_id'";
    $update_query = "UPDATE categories SET nume='$nume', descriere='$descriere' WHERE id ='$category_id'";
    $update_query_run = mysqli_query($con, $update_query);

    if ($update_query_run) {
        // if ($_FILES['image']['name'] != "") {
        //     move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $update_filename);
        //     if (file_exists("../uploads/" . $old_image)) {
        //         unlink("../uploads/" . $old_image);
        //     }
        // }
        redirect("editCategory.php?id=$category_id", "Categorie editată cu succes!");
    } else {
        redirect("editCategory.php?id=$category_id", "Ceva nu a mers bine!");
    }
} else if (isset($_POST['deleteCategoryButton'])) {
    $category_id = mysqli_real_escape_string($con, $_POST['category_id']);

    $category_query = "SELECT * FROM categories WHERE id='$category_id'";
    $category_query_run = mysqli_query($con, $category_query);
    $category_data = mysqli_fetch_array($category_query_run);
    $image = $category_data['image'];

    $delete_query = "DELETE FROM categories WHERE id = '$category_id' ";
    $delete_query_run = mysqli_query($con, $delete_query);
    if ($delete_query_run) {
        if (file_exists("../DAWM/uploads/" . $image)) {
            unlink("../DAWM/uploads/" . $image);
        }
        // redirect("category.php", "Categoria a fost ștearsă!");
        echo 200;
    } else {
        // redirect("category.php", "Ceva nu a mers bine!");
        echo 500;
    }
} else if (isset($_POST['addProductButton'])) {
    function getIDActive($table, $id)
    {
        global $con;
        $query = "SELECT * FROM $table where id='$id' ";
        return $query_run = mysqli_query($con, $query);
    }
    if ($_SESSION['role_as'] == 0) {
        $id_current = $_SESSION['id'];
        // $email_current = $_SESSION['email'];
        $nume = $_POST['nume'];
        $descriere = $_POST['descriere'];
        $image = $_FILES['image']['name'];
        $varsta = $_POST['varsta'];

        // adaugare email in tabela de animale
        $category = getIDActive("users", $id_current);
        $category_id = $_POST['category_id'];
        if (mysqli_num_rows($category) > 0)
            foreach ($category as $item) {
                $id = $item['id'];
                $email_current = $item['email'];
                $phone_current = $item['phone'];
                $name_current = $item['name'];
            }
        //------------------------------------

        $path = "../DAWM/uploads";

        $image_ext = pathinfo($image, PATHINFO_EXTENSION); // extensia imagine
        $filename = time() . '.' . $image_ext; //creare nume


        if ($nume != "" && $descriere != "") {
            $product_query = "INSERT into products(category_id, nume, descriere, varsta, image, added_by_ID, added_by_EMAIL, added_by_PHONE, added_by_NAME) values ('$category_id', '$nume', '$descriere', '$varsta', '$filename', '$id', '$email_current', '$phone_current', '$name_current')";
            $product_query_run = mysqli_query($con, $product_query);
            if ($product_query_run) {
                move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $filename);
                redirect("adaugaAnimal.php", "Produs adăugată cu succes!");
            } else {
                redirect("adaugaAnimal.php", " Ceva nu a mers bine!");
            }
        }
    }
} else if (isset($_POST['deleteMessageButton'])) {
    // $messages_id = $_POST['messages_id'];
    $messages_id = mysqli_real_escape_string($con, $_POST['messages_id']);
    $messages_query = "SELECT * FROM contact WHERE id='$messages_id'";
    $messages_query_run = mysqli_query($con, $messages_query);
    $messages_data = mysqli_fetch_array($messages_query_run);

    $deleteM_query = "DELETE FROM contact WHERE id = '$messages_id' ";
    $deleteM_query_run = mysqli_query($con, $deleteM_query);
    if ($deleteM_query_run) {
        // redirect("citesteMesaje.php", "Mesajul a fost șters");
        echo 200;
    } else {
        // redirect("citesteMesaje.php", "Ceva nu a mers bine!");
        echo 500;
    }
} else if (isset($_POST['deleteUserButton'])) {
    $userG_id = $_POST['userG_id'];
    $userG_id = mysqli_real_escape_string($con, $_POST['userG_id']);
    $userG_query = "SELECT * FROM users WHERE id='$userG_id'";
    $userG_query_run = mysqli_query($con, $userG_query);
    $userG_data = mysqli_fetch_array($userG_query_run);

    $deleteM_query = "DELETE FROM users WHERE id = '$userG_id' ";
    $deleteM_query_run = mysqli_query($con, $deleteM_query);
    if ($deleteM_query_run) {
        // redirect("gestiune.php", "Utilizatorul a fost șters");
        echo 200;
    } else {
        // redirect("gestiune.php", "Ceva nu a mers bine!");
        echo 500;
    }
} else if (isset($_POST['updateProductButton'])) {
    $product_id = $_POST['product_id'];
    $category_id = $_POST['category_id'];
    $nume = $_POST['nume'];
    $descriere = $_POST['descriere'];
    // $image = $_FILES['image']['name'];
    $varsta = $_POST['varsta'];

    // $path = "../DAWM/uploads";

    // $new_image = $_FILES['image']['name'];
    // $old_image = $_POST['old_image'];

    // if ($new_image != "") {
    //     // $update_filename = $new_image;
    //     $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    //     $update_filename = time() . '.' . $image_ext;
    // } else {
    //     $update_filename = $old_image;
    // }

    // $update_product_query = "UPDATE products SET nume='$nume', descriere='$descriere', varsta='$varsta', image='$update_filename' WHERE id='$product_id'";
    $update_product_query = "UPDATE products SET nume='$nume', descriere='$descriere', varsta='$varsta' WHERE id='$product_id'";
    $update_product_query_run = mysqli_query($con, $update_product_query);
    if ($update_update_query_run) {
        // if ($_FILES['image']['name'] != "") {
        //     move_uploaded_file($_FILES['image']['tmp_name'], $path . '/' . $update_filename);
        //     if (file_exists("../DAWM/uploads/" . $old_image)) {
        //         unlink("../DAWM/uploads/" . $old_image);
        //     }
        // }
        redirect("ediProduct.php?id=$product_id", "Produs editat cu succes!");
    } else {
        redirect("editProduct.php?id=$product_id", "Ceva nu a mers bine!");
    }
} else if (isset($_POST['updateUserButton'])) {

    if ($_SESSION['role_as'] == 1) {
        $user_id = $_POST['user_id'];
        $name = $_POST['name'];
        $update_user_credentials_query = "UPDATE users SET name='$name' WHERE id = '$user_id'";
        $update_user_credentials_query_run = mysqli_query($con, $update_user_credentials_query);
        if ($update_user_credentials_query) {
            redirect("editUser.php?id=$user_id", "User actualizat cu succes");
        } else {
            redirect("editUser.php?id=$user_id", "Ceva nu a mers bine!");
        }
    } else {
        $user_id = $_POST['user_id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $check_email_query = "SELECT email FROM users WHERE email='$email' ";
        $check_email_query_run = mysqli_query($con, $check_email_query);
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        } else  if (mysqli_num_rows($check_email_query_run) > 0) {
            $update_user_credentials_query = "UPDATE users SET name='$name', phone='$phone', password='$password' WHERE id = '$user_id'";
            $update_user_credentials_query_run = mysqli_query($con, $update_user_credentials_query);
            $_SESSION['message'] = "Adresa de email este deja înregistrată!";
            header('Location: ../editMyUser.php?id="user_id"');
        } else {
            $update_user_credentials_query = "UPDATE users SET name='$name', phone='$phone', email='$email', password='$password' WHERE id = '$user_id'";
            $update_user_credentials_query_run = mysqli_query($con, $update_user_credentials_query);
            // $_SESSION['message'] = "Datele au fost modificate!";
            // }
        }
        if ($update_user_credentials_query) {
            redirect("editMyUser.php?id=$user_id", "User actualizat cu succes");
        } else {
            redirect("editMyUser.php?id=$user_id", "Ceva nu a mers bine!");
        }
    }
} else if (isset($_POST['deleteProductButton'])) {
    $product_id = mysqli_real_escape_string($con, $_POST['product_id']);
    $product_query = "SELECT * FROM products WHERE id='$product_id'";
    $product_query_run = mysqli_query($con, $product_query);
    $product_data = mysqli_fetch_array($product_query_run);
    $image = $product_data['image'];

    $delete_query = "DELETE FROM products WHERE id = '$product_id' ";
    $delete_query_run = mysqli_query($con, $delete_query);
    if ($delete_query_run) {
        // if (file_exists("../DAWM/uploads/" . $image)) {
        //     unlink("../DAWM/uploads/" . $image);
        // }
        // redirect("animale.php", "Produsul a fost șters!");
        echo 200;
    } else {
        // redirect("animale.php", "Ceva nu a mers bine!");
        echo 500;

    }
} else if (isset($_POST['addReviewButton'])) {

        $nume = $_POST['nume'];
        $email = $_POST['email'];
        $mesaj = $_POST['mesaj'];
        $rating = $_POST['rating'];
        $added_by_ID = $_SESSION['id'];
        // if($rating <= 5 && $rating >= 1)
        $review_query = "INSERT INTO review(nume, email, mesaj, rating, added_by_ID) VALUES ('$nume', '$email', '$mesaj', '$rating', '$added_by_ID')";
    
        $review_query_run = mysqli_query($con, $review_query);
        if ($review_query_run) {
            redirect("addReview.php", "Review adăugat cu succes!");
        } else {
            redirect("addReview.php", "Ceva nu a mers bine!");
        }
    
} else if(isset($_POST['deleteReviewButton'])) {
    $review_id = mysqli_real_escape_string($con, $_POST['review_id']);

    $review_query = "SELECT * FROM review WHERE id='$review_id'";
    $review_query_run = mysqli_query($con, $review_query);
    $review_data = mysqli_fetch_array($review_query_run);
    

    $delete_query = "DELETE FROM review WHERE id = '$review_id' ";
    $delete_query_run = mysqli_query($con, $delete_query);
    if ($delete_query_run) {
        // redirect("gestiuneReview.php", "Review șters!");
        echo 200;
    } else {
        // redirect("gestiuneReview.php", "Ceva nu a mers bine!");
        echo 500;
    }
} else if(isset($_POST['updateReviewButton'])) {
    $user_id = $_POST['user_id'];
    $nume = $_POST['nume'];
    $mesaj = $_POST['mesaj'];
    $rating = $_POST['rating'];
    $update_review_query = "UPDATE review SET nume='$nume', mesaj='$mesaj', rating='$rating' WHERE id = '$user_id'";
    $update_review_query_run = mysqli_query($con, $update_review_query);
    
    header('Location: ../editMyUser.php?id="user_id"');
    
    if ($update_review_query_run) {
        redirect("editMyReview.php?id=$user_id", "Review actualizat cu succes");
    } else {
        redirect("editMyReview.php?id=$user_id", "Ceva nu a mers bine!");
    }
} else if(isset($_POST['addMessageButton'])) {
        $nume = $_POST['name'];
        $prenume = ($_POST['prenume']);
        $email = $_POST['email'];
        $descriere = $_POST['descriere'];
        $telefon = $_POST['telefon'];
        // $added_by_ID = $_SESSION['id'];
        // if($rating <= 5 && $rating >= 1)
        $contact_query = "INSERT INTO contact(name, prenume, telefon, email, descriere) VALUES ('$nume', '$prenume', '$telefon', '$email', '$descriere')";
    
        $contact_query_run = mysqli_query($con, $contact_query);
        if ($contact_query_run) {
            redirect("contactForm.php", "Mesaj adăugat cu succes!");
        } else {
            redirect("contactForm.php", "Ceva nu a mers bine!");
        }
}