<?php
/**
 * Created by PhpStorm.
 * User: tuzao
 * Date: 28/09/2018
 * Time: 14:52
 */



class peti
{
    private $id_peti;
    private $str_month;
    private $str_year;
    private $tb_city_id_city;
    private $tb_beneficiaries_id_beneficiaries;
    private $str_benefit_situation;
    private $db_value;


    public function __construct($id_peti, $str_month, $str_year, $tb_city_id_city, $tb_beneficiaries_id_beneficiaries, $str_benefit_situation, $db_value)
    {
        $this->id_peti = $id_peti;
        $this->str_month = $str_month;
        $this->str_year = $str_year;
        $this->tb_city_id_city = $tb_city_id_city;
        $this->tb_beneficiaries_id_beneficiaries = $tb_beneficiaries_id_beneficiaries;
        $this->str_benefit_situation = $str_benefit_situation;
        $this->db_value = $db_value;
    }

    /**
     * @return mixed
     */
    public function getIdPeti()
    {
        return $this->id_peti;
    }

    /**
     * @param mixed $id_peti
     */
    public function setIdPeti($id_peti)
    {
        $this->id_peti = $id_peti;
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
    public function getTbCityIdCity()
    {
        return $this->tb_city_id_city;
    }

    /**
     * @param mixed $tb_city_id_city
     */
    public function setTbCityIdCity($tb_city_id_city)
    {
        $this->tb_city_id_city = $tb_city_id_city;
    }

    /**
     * @return mixed
     */
    public function getTbBeneficiariesIdBeneficiaries()
    {
        return $this->tb_beneficiaries_id_beneficiaries;
    }

    /**
     * @param mixed $tb_beneficiaries_id_beneficiaries
     */
    public function setTbBeneficiariesIdBeneficiaries($tb_beneficiaries_id_beneficiaries)
    {
        $this->tb_beneficiaries_id_beneficiaries = $tb_beneficiaries_id_beneficiaries;
    }

    /**
     * @return mixed
     */
    public function getStrBenefitSituation()
    {
        return $this->str_benefit_situation;
    }

    /**
     * @param mixed $str_benefit_situation
     */
    public function setStrBenefitSituation($str_benefit_situation)
    {
        $this->str_benefit_situation = $str_benefit_situation;
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





}