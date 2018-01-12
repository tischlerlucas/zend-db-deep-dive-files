<?php


namespace Db\Hydration\Reflection;


class MayorSalaryEntity
{
    private $capital;
    private $mayor;
    private $salary;

    public function getCapital()
    {
        return $this->capital;
    }

    public function getMayor()
    {
        return $this->mayor;
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
