<?php


namespace Db\Hydration\Serializable;


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

    public function exchangeArray(array $data = [])
    {
        if (!empty($data)) {
            $attibutesNames = [
                'capital',
                'mayor',
                'salary',
            ];

            foreach ($attibutesNames as $attribute) {
                $this->$attribute = $data[$attribute] ?? null;
            }
        }
    }
}
