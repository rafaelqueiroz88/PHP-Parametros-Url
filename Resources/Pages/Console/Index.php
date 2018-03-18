<?php
use Config\DatabaseConnector\Database;
use App\Models\Console;
$db = Database::GetConnection();
new Console( $db );
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1>Console Mode_</h1>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h3>Models_</h3>
            <ul>
                <?php Console::ListModels(); ?>
            </ul>
            <button class="btn btn-outline-primary">
                Create New_
            </button>
        </div>
        <div class="col-md-6">
            <h3>Controllers_</h3>
            <ul>
                <?php Console::ListControllers(); ?>
            </ul>
            <button class="btn btn-outline-primary">
                Create New_
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <h3>Views_</h3>
            <ul>
                <?php Console::ListViews(); ?>
            </ul>
            <button class="btn btn-outline-primary">
                Create New_
            </button>
        </div>
        <div class="col-md-6">
            <h3>Tables_</h3>
            <ul>
                <?php Console::ListDBTables(); ?>
            </ul>
            <button class="btn btn-outline-primary">
                Create New_
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h3>Route and Actions_</h3>
            <ul>
                <li>
                    Admin
                    <ul>
                        <li>New</li>
                        <li>Edit / #</li>
                        <li>Show / #</li>
                        <li>Delete / #</li>
                    </ul>
                </li>
            </ul>
            <button class="btn btn-outline-primary">
                Create New_
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <hr />
            <h3 align="center">Scaffold</h3>
            <button class="btn btn-outline-primary">
                Create New_
            </button>
        </div>
    </div>
</div>