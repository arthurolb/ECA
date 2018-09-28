<?php
/**
 * Created by PhpStorm.
 * User: tuzao
 * Date: 28/09/2018
 * Time: 14:55
 */

require_once "classes/template.php";
require_once "dao/petiDAO.php";
require_once "classes/peti.php";


$object = new petiDAO();

$template = new Template();

$template->header();
$template->sidebar();
$template->mainpanel();


// Verificar se foi enviando dados via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = (isset($_POST["id"]) && $_POST["id"] != null) ? $_POST["id"] : "";
    $str_month = (isset($_POST["str_month"]) && $_POST["str_month"] != null) ? $_POST["str_month"] : "";
    $str_year = (isset($_POST["str_year"]) && $_POST["str_year"] != null) ? $_POST["str_year"] : "";
    $tb_city_id_city = (isset($_POST["tb_city_id_city"]) && $_POST["tb_city_id_city"] != null) ? $_POST["tb_city_id_city"] : "";
    $tb_beneficiaries_id_beneficiaries = (isset($_POST["tb_beneficiaries_id_beneficiaries"]) && $_POST["tb_beneficiaries_id_beneficiaries"] != null) ? $_POST["tb_beneficiaries_id_beneficiaries"] : "";
    $str_benefit_situation = (isset($_POST["str_benefit_situation"]) && $_POST["str_benefit_situation"] != null) ? $_POST["str_benefit_situation"] : "";
    $db_value = (isset($_POST["db_value"]) && $_POST["db_value"] != null) ? $_POST["db_value"] : "";


} else if (!isset($id)) {
    // Se não se não foi setado nenhum valor para variável $id
    $id = (isset($_GET["id"]) && $_GET["id"] != null) ? $_GET["id"] : "";
    $str_month = NULL;
    $str_year = NULL;
    $str_benefit_situation = NULL;
    $db_value = NULL;

}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "upd" && $id != "") {

    $peti = new peti($id, '', '', '', '', '','');

    $resultado = $object->atualizar($peti);
    $str_month = $resultado->getStrMonth();
    $str_year = $resultado->getStrYear();
    $tb_city_id_city = $resultado->getTbCityIdCity();
    $tb_beneficiaries_id_beneficiaries = $resultado->getTbBeneficiariesIdBeneficiaries();
    $str_benefit_situation = $resultado->getStrBenefitSituation();
    $db_value = $resultado->getDbValue();

}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "save" && $str_month != "" && $str_year!= "" &&
    $tb_city_id_city!= "" && $tb_beneficiaries_id_beneficiaries!= "" && $str_benefit_situation!= "" && $db_value!= "")
{
    $peti = new peti($id, $str_month, $str_year, $tb_city_id_city, $tb_beneficiaries_id_beneficiaries, $str_benefit_situation, $db_value);
    $msg = $object->salvar($peti);
    $id = null;
    $str_month = NULL;
    $str_year = NULL;
    $tb_city_id_city = NULL;
    $tb_beneficiaries_id_beneficiaries = NULL;
    $str_benefit_situation = NULL;
    $db_value = NULL;

}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "del" && $id != "") {
    $peti = new peti($id,'','','','','', '');
    $msg = $object->remover($peti);
    $id = null;
}

?>

    <div class='content' xmlns="http://www.w3.org/1999/html">
        <div class='container-fluid'>
            <div class='row'>
                <div class='col-md-12'>
                    <div class='card'>
                        <div class='header'>
                            <h4 class='title'>Peti</h4>
                            <p class='category'>List of Peti of the system</p>

                        </div>
                        <div class='content table-responsive'>

                            <form action="?act=save&id=" method="POST" name="form1">

                                <input type="hidden" name="id" value="<?php
                                // Preenche o id no campo id com um valor "value"
                                echo (isset($id) && ($id != null || $id != "")) ? $id : '';
                                ?>"/>
                                Month:
                                <input class="form-control" type="number"  name="str_month" placeholder="MM" value="<?php
                                // Preenche o nome no campo nome com um valor "value"
                                echo (isset($str_month) && ($str_month != null || $str_month != "")) ? $str_month : '';
                                ?>"/>
                                <br/>
                                Year:
                                <input class="form-control" type="number"   name="str_year" placeholder="YYYY" value="<?php
                                // Preenche o sigla no campo sigla com um valor "value"
                                echo (isset($str_year) && ($str_year != null || $str_year != "")) ? $str_year : '';
                                ?>"/>
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
                                Situation:
                                <input class="form-control" type="text" name="str_benefit_situation" value="<?php
                                // Preenche o sigla no campo sigla com um valor "value"
                                echo (isset($str_benefit_situation) && ($str_benefit_situation != null || $str_benefit_situation != "")) ? $str_benefit_situation : '';
                                ?>"/>
                                <br/>
                                Value:
                                <input class="form-control" type="number" name="db_value" value="<?php
                                // Preenche o sigla no campo sigla com um valor "value"
                                echo (isset($db_value) && ($db_value != null || $db_value != "")) ? $db_value : '';
                                ?>"/>
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