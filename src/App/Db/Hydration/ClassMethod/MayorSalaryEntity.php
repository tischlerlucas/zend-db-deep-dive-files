<?php


namespace Db\Hydration\ClassMethod;


class MayorSalaryEntity
{
    private $capital;
    private $mayor;
    private $salary;

    public function setCapital(string $capital)
    {
        $this->capital = $capital;
    }

    public function getCapital()
    {
        return $this->capital;
    }

    public function setMayor(string $mayor)
    {
        $this->mayor = $mayor;
    }

    public function getMayor()
    {
        return $this->mayor;
    }

    public function setSalary(string $salary)
    {
        $this->salary = $salary;
    }

    public function getSalary()
    {
        return $this->salary;
    }
}
