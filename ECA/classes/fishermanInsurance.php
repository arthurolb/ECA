<?php
/**
 * Created by PhpStorm.
 * User: tassio
 * Date: 23/08/2018
 * Time: 21:47
 */

class fishermanInsurance
{

    private $id_fishermanInsurance;
    private $str_month;
    private $str_year;
    private $db_value;
    private $int_rgp;
    private $tb_beneficiaries_id_beneficiaries;
    private $tb_city_id_city;

    /**
     * fishermanInsurance constructor.
     * @param $id_fishermanInsurance
     * @param $str_month
     * @param $str_year
     * @param $db_value
     * @param $int_rgp
     * @param $tb_city_id_city
     */
    public function __construct($id_fishermanInsurance, $str_month, $str_year, $db_value, $int_rgp, $tb_beneficiaries_id_beneficiaries,  $tb_city_id_city)
    {
        $this->id_fishermanInsurance = $id_fishermanInsurance;
        $this->str_month = $str_month;
        $this->str_year = $str_year;
        $this->db_value = $db_value;
        $this->int_rgp = $int_rgp;
        $this->tb_beneficiaries_id_beneficiaries = $tb_beneficiaries_id_beneficiaries;
        $this->tb_city_id_city = $tb_city_id_city;


    }

    /**
     * @return mixed
     */
    public function getIdFishermanInsurance()
    {
        return $this->id_fishermanInsurance;
    }

    /**
     * @param mixed $id_fishermanInsurance
     */
    public function setIdFishermanInsurance($id_fishermanInsurance)
    {
        $this->id_fishermanInsurance = $id_fishermanInsurance;
    }

    /**
     * @return mixed
     */
    public function getStrMonth()
    {
        return $this->str_month;
    }

    /**
     * @param mixed $str_month
     */
    public function setStrMonth($str_month)
    {
        $this->str_month = $str_month;
    }

    /**
     * @return mixed
     */
    public function getStrYear()
    {
        return $this->str_year;
    }

    /**
     * @param mixed $str_year
     */
    public function setStrYear($str_year)
    {
        $this->str_year = $str_year;
    }

    /**
     * @return mixed
     */
    public function getDbValue()
    {
        return $this->db_value;
    }

    /**
     * @param mixed $db_value
     */
    public function setDbValue($db_value)
    {
        $this->db_value = $db_value;
    }

    public function getIntRgp()
    {
        return $this->db_value;
    }

    /**
     * @param mixed $db_value
     */
    public function setIntRgp($db_value)
    {
        $this->db_value = $db_value;
    }



    /**
     * @param mixed $db_value
     */
    public function setBeneficiariesIdBeneficiaries($tb_beneficiaries_id_beneficiaries)
    {
        $this->tb_beneficiaries_id_beneficiaries = $tb_beneficiaries_id_beneficiaries;
    }

    public function getBeneficiariesIdBeneficiaries()
    {
        return $this->tb_beneficiaries_id_beneficiaries;
    }

    /**
     * @param mixed $db_value
     */
    public function setCityIdCity($tb_city_id_city)
    {
        $this->tb_city_id_city = $tb_city_id_city;
    }

    public function getCityIdCity()
    {
        return $this->tb_city_id_city;
    }



}