<?php

class Pagination
{
    private $data;
    private $counts;
    private $start;
    private $total_values;

    public function paginate($values, $perpage)
    {
        $this->total_values = count($values);

        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        $this->start = ($page - 1) * $perpage;

        $this->counts = ceil($this->total_values / $perpage);

        $this->data = array_slice($values, $this->start, $perpage);

        for ($i = 1; $i <= $this->counts; $i++) {
            $nums[] = $i;
        }
        return $nums;
    }

    public function fetchResult()
    {
        $data = $this->data;
        return $data;
    }

    public function count()
    {
        $count = $this->counts;
        return $count;
    }

    public function starts()
    {
        $starts = $this->start;
        return $starts;
    }

    public function total_values()
    {
        $total = $this->total_values;
        return $total;
    }
}
