<?php

namespace App\Controllers;

use App\Models\Customer;
use App\Controllers\BaseController;

class CustomerController extends BaseController
{
    public function list()
    {
        $customerModel = new Customer();
        $customers = $customerModel->all();

        $template = 'customers';
        $data = [
            'title' => 'Customers',
            'items' => $customers
        ];

        return $this->render($template, $data);
    }

    public function single($id)
    {
        $customerModel = new Customer();
        $customer = $customerModel->getCustomer($id);

        $template = 'single-customer';
        $data = [
            'title' => 'Customer Details',
            'customer' => $customer
        ];

        return $this->render($template, $data);
    }

    public function update($id)
    {
        $customerModel = new Customer();
        $customer = $customerModel->getCustomer($id);
        $customer->fill($_POST);
        $result = $customer->update();

        $template = 'single-customer';
        $data = [
            'title' => 'Customer Details',
            'customer' => $customer,
            'success' => $result
        ];

        return $this->render($template, $data);
    }
}
