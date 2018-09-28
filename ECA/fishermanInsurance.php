<?php

require_once "classes/template.php";

require_once "dao/fishermanInsuranceDAO.php";
require_once "classes/fishermanInsurance.php";


$object = new fishermanInsuranceDAO();



$template = new Template();

$template->header();
$template->sidebar();
$template->mainpanel();


// Verificar se foi enviando dados via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_fishermanInsurance = (isset($_POST["id_fishermanInsurance"]) && $_POST["id_fishermanInsurance"] != null) ? $_POST["id_fishermanInsurance"] : "";
    $str_month = (isset($_POST["str_month"]) && $_POST["str_month"] != null) ? $_POST["str_month"] : "";
    $str_year= (isset($_POST["str_year"]) && $_POST["str_year"] != null) ? $_POST["str_year"] : "";
    $db_value = (isset($_POST["db_value"]) && $_POST["db_value"] != null) ? $_POST["db_value"] : "";   
    $int_rgp = (isset($_POST["int_rgp"]) && $_POST["int_rgp"] != null) ? $_POST["int_rgp"] : "";
    $tb_beneficiaries_id_beneficiaries = (isset($_POST["tb_beneficiaries_id_beneficiaries"]) && $_POST["tb_beneficiaries_id_beneficiaries"] != null) ? $_POST["tb_beneficiaries_id_beneficiaries"] : "";
    $tb_city_id_city = (isset($_POST["tb_city_id_city"]) && $_POST["tb_city_id_city"] != null) ? $_POST["tb_city_id_city"] : "";


} else if (!isset($id_fishermanInsurance)) {

    // Se não se não foi setado nenhum valor para variável $id_fishermanInsurance
    $id_fishermanInsurance = (isset($_GET["id_fishermanInsurance"]) && $_GET["id_fishermanInsurance"] != null) ? $_GET["id_fishermanInsurance"] : "";
    $str_month = NULL;
    $str_year = NULL;
    $db_value = NULL;
    $int_rgp = NULL;
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "upd" && $id_fishermanInsurance != "") {

    $fishermanInsurance = new fishermanInsurance($id_fishermanInsurance, '', '','','','','');

    $resultado = $object->atualizar($fishermanInsurance);
    $str_month = $resultado->getStrMonth();
    $db_value = $resultado->getDbValue();
    $str_year = $resultado->getStrYear();
    $int_rgp = $resultado->getIntRgp();
    $tb_beneficiaries_id_beneficiaries = $resultado->getBeneficiariesIdBeneficiaries();
    $tb_city_id_city = $resultado->getCityIdCity();
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "save"  && $str_month!= "" && $str_year!="" && $db_value != "" && $int_rgp!="" && $tb_beneficiaries_id_beneficiaries!= "" && $tb_city_id_city!= "") {
    $fishermanInsurance = new fishermanInsurance($id_fishermanInsurance, $str_month, $str_year ,$db_value,$int_rgp,$tb_beneficiaries_id_beneficiaries,$tb_city_id_city);
    $msg = $object->salvar($fishermanInsurance);
    $id_fishermanInsurance = null;
    $str_month = null;
    $str_year = null;
    $db_value = null;
    $int_rgp = null;

}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "del" && $id_fishermanInsurance != "") {
    $fishermanInsurance = new fishermanInsurance($id_fishermanInsurance, '', '','','','','' );
    $msg = $object->remover($fishermanInsurance);
    $id_fishermanInsurance = null;
}

?>

<div class='content' xmlns="http://www.w3.org/1999/html">
    <div class='container-fluid'>
        <div class='row'>
            <div class='col-md-12'>
                <div class='card'>
                    <div class='header'>
                        <h4 class='title'>Fisherman Insurance</h4>
                        <p class='category'>List of fishermanInsurance of the system</p>

                    </div>
                    <div class='content table-responsive'>

                        <form action="?act=save&$id_fishermanInsurance=" method="POST" name="form1">

                            <input type="hidden" name="id_fishermanInsurance" value="<?php
                            // Preenche o id no campo id com um valor "value"
                            echo (isset($id_fishermanInsurance) && ($id_fishermanInsurance != null || $id_fishermanInsurance != "")) ? $id_fishermanInsurance : '';
                            ?>"/>
                            Month:
                            <input class="form-control" type="text" name="str_month" value="<?php
                            // Preenche o nome no campo nome com um valor "value"
                            echo (isset($str_month) && ($str_month != null || $str_month != "")) ? $str_month : '';
                            ?>"/>
                            <br/>
                            year:
                            <input class="form-control" type="text" maxlength="11" name="str_year" placeholder="Enter numbers only" value="<?php
                            // Preenche o sigla no campo sigla com um valor "value"
                            echo (isset($str_year) && ($str_year != null || $str_year != "")) ? $str_year : '';
                            ?>"/>
                            value:
                            <input class="form-control" type="text" maxlength="14" name="db_value" value="<?php
                            // Preenche o sigla no campo sigla com um valor "value"
                            echo (isset($db_value) && ($db_value != null || $db_value != "")) ? $db_value : '';
                            ?>"/>
                            RGP:
                            <input class="form-control" type="text" maxlength="11" name="int_rgp" value="<?php
                            // Preenche o sigla no campo sigla com um valor "value"
                            echo (isset($int_rgp) && ($int_rgp != null || $int_rgp != "")) ? $int_rgp : '';
                            ?>"/>
                            Beneficiarie:
                            <select class="form-control" name="tb_beneficiaries_id_beneficiaries">
                                <?php
                                $query = "SELECT * FROM tb_beneficiaries order by str_name_person;";
                                $statement = $pdo->prepare($query);
                                if ($statement->execute()) {
                                    $result = $statement->fetchAll(PDO::FETCH_OBJ);
                                    foreach ($result as $rs) {
                                        if ($rs->id_beneficiaries == $tb_beneficiaries_id_beneficiaries) {
                                            echo "<option value='$rs->id_beneficiaries' selected>$rs->str_name_person</option>";
                                        } else {
                                            echo "<option value='$rs->id_beneficiaries'>$rs->str_name_person</option>";
                                        }
                                    }
                                } else {
                                    throw new PDOException("<script> alert('Não foi possível executar a declaração SQL !'); </script>");
                                }
                                ?>
                            </select>
                            <br/>

                            City:
                            <select class="form-control" name="tb_city_id_city">
                                <?php
                                $query = "SELECT * FROM tb_city order by str_name_city;";
                                $statement = $pdo->prepare($query);
                                if ($statement->execute()) {
                                    $result = $statement->fetchAll(PDO::FETCH_OBJ);
                                    foreach ($result as $rs) {
                                        if ($rs->id_city == $tb_city_id_city) {
                                            echo "<option value='$rs->id_city' selected>$rs->str_name_city</option>";
                                        } else {
                                            echo "<option value='$rs->id_city'>$rs->str_name_city</option>";
                                        }
                                    }
                                } else {
                                    throw new PDOException("<script> alert('Não foi possível executar a declaração SQL !'); </script>");
                                }
                                ?>
                            </select>
                            <br/>
                            <br/>
                            <input class="btn btn-success" type="submit" value="REGISTER">
                            <hr>
                        </form>


                        <?php
                        echo (isset($msg) && ($msg != null || $msg != "")) ? $msg : '';
                        //chamada a paginação
                        $object->tabelapaginada();

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$template->footer();
?>
