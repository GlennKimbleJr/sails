<?php

namespace App\Collections;

use Illuminate\Database\Eloquent\Collection;

class SaleCollection extends Collection
{
    public function quoted()
    {
        return $this->whereStatus('quoted');
    }

    private function whereStatus($status)
    {
        return $this->filter(function ($sale) use ($status) {
            return $sale->status == $status;
        });
    }

    public function pending()
    {
        return $this->whereStatus('pending');
    }

    public function delivered()
    {
        return $this->whereStatus('delivered');
    }
}
