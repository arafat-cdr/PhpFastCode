<?php
function table_view($title = false, $th, $td, $view = true, $edit = true, $delete = true, $other_actions = [], $action = "Actions", $datatable_id = "datatable-tabletools") {
	echo <<< EOD
    <div class="row">
        <div class="col">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>

                    <h2 class="card-title">$title</h2>
                </header>
                <div class="card-body">
                    <table class="table table-bordered table-striped mb-0" id="$datatable_id">
                        <thead>
                            <tr>
EOD;
	# Printing the Table Header ...........
	$id = NULL;
	if (is_object($th) || is_array($th)) {
		foreach ($th as $k => $v) {
			echo "<th>$v</th>";
		}
	}
	# Check if action is set ....
	if ($action) {
		echo "<th>$action</th>";
	}
	# End Printing The Table Header .....

	echo <<<EOD
        </tr>
    </thead>
    <tbody>
EOD;
	# Now Printg the data Using 2 Foreach
	if (is_object($td) || is_array($td)) {
		foreach ($td as $k => $v) {
			echo "<tr>";
			foreach ($v as $kk => $vv) {
				if ($kk == "id") {
					$id = $vv;
				} else {
					echo "<td>$vv</td>";
				}
			}

			# If Actions is Set Then
			if ($action) {
				echo "<td style='white-space: nowrap;'>";
				if ($view) {
					echo <<<EOD
                    <a href="$view?action=view&id=$id "><buttons  class="btn btn-primary" disabled="disabled"><i class="fas fa-eye"></i></button></a>
EOD;
				}

				if ($edit) {
					echo <<<EOD
                    <a href="$edit?action=edit&id=$id">
                       <buttons  class="btn btn-success" disabled="disabled"><i class="fas fa-edit"></i></button>
                    </a>
EOD;
				}

                # Inject Others Actions Here..

                if( !empty(is_array($other_actions)) ){
                    foreach($other_actions as $action_key => $action_val){

                    # Matching Get part and process it
                    if(strpos($action_val, "?") !== false){
                        $url = $action_val."&id=$id";
                    }else{
                        $url = $action_val."?id=$id";
                    }
                    # End matching Get Part and Process it...

                    echo <<<EOD
                    <a href="$url">
                       <buttons  class="btn btn-info" disabled="disabled"> $action_key </button>
                    </a>
EOD;
                    }
                }

                # End Inject Others Actions Here ..

				if ($delete) {
					echo <<<EOD

                    <a href="?action=delete&id=$id" onclick="return confirm('are you sure You Wanna Delete ? It Will Batch delete Data From Multiple Table Where It is Related to ! ')">
                        <buttons  class="btn btn-danger" disabled="disabled"><i class="far fa-trash-alt"></i></button>
                    </a>
EOD;
				}

				echo "</td>";
			}
			echo "</tr>";
		}
	}
# Now Close All the Previous Open Tags
	echo <<<EOD
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>
EOD;
}

function details_table_view($title = false, $data) {
	echo <<< EOD
    <div class="row">
        <div class="col">
            <section class="card">
                <header class="card-header">
                    <div class="card-actions">
                        <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                        <a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
                    </div>

                    <h2 class="card-title">$title</h2>
                </header>
                <div class="card-body">
                    <table class="table table-bordered table-striped mb-0">
                        <tbody>
EOD;
	if (is_object($data) || is_array($data)) {
		if ($data) {
			// pr($data);
			foreach ($data as $k => $v) {
				// pr($v);
				echo "<tr>";
				if (strpos($k, "_id") !== false) {
					$table_foreign_key = $k;
					$search_id = $v;

					$col_head_name = NULL;
					if ($table_foreign_key == "user_id") {
						$col_head_name = "Created By";
					} else {
						$table_name = str_replace("_id", "", $table_foreign_key);
						$col_head_name = ucwords(str_replace("_", " ", $table_name) . " Name");
					}

					echo "<td>";
					echo $col_head_name;
					echo "</td>";

					echo "<td>";

					if (isset($data->$table_foreign_key)) {
                        // This is only true when we have , seperated
                        // foregin key that menas it has multi value..
                        if( is_array($data->$table_foreign_key) ){
                            // pr($data->$table_foreign_key);
                            $deep_data_str = NULL;
                            foreach($data->$table_foreign_key as $deep_v => $deep_data)
                            {
                                if (property_exists($deep_data, "name")) {
                                    $deep_data_str .= $deep_data->name.", ";
                                } else if (property_exists($deep_data, "first_name") && property_exists($deep_data, "last_name")) {
                                    $deep_data_str .= $deep_data->first_name . " " . $deep_data->last_name.", ";
                                } else if (property_exists($deep_data, "data_value")) {
                                    $deep_data_str .= $deep_data->data_value.", ";
                                }
                            }
                            # Now rtrim , and print it..
                            echo rtrim($deep_data_str, ",");

                        } else if (property_exists($data->$table_foreign_key, "name")) {
							echo $data->$table_foreign_key->name;
						} else if (property_exists($data->$table_foreign_key, "first_name") && property_exists($data->$table_foreign_key, "last_name")) {
							echo $data->$table_foreign_key->first_name . " " . $data->$table_foreign_key->last_name;
						} else if (property_exists($data->$table_foreign_key, "data_value")) {
							echo $data->$table_foreign_key->data_value;
						}
					}

					echo "</td>";
				} else if (in_array($k, array("image", "images", "pic", "pictures", "img", "picture", "profile_pic", "profile_img", "photo", "photos"))) {
					# Check for Image
					echo "<td>";
					echo ucwords(str_replace("_", " ", $k));
					echo "</td>";

					if ($v) {
						echo "<td>";
						echo "<img src='" . str_replace("/index.php", "", APP_URL) . "/" . $v . "' height='200' width='400'>";
						echo "</td>";
					} else {
						echo "<td>";
						echo $v;
						echo "</td>";
					}
				} else {
					echo "<td>";
					echo ucwords(str_replace("_", " ", $k));
					echo "</td>";

					echo "<td>";
					echo $v;
					echo "</td>";
				}
				echo "</tr>";

			}
		}
	}

# Now Close All the Previous Open Tags
	echo <<<EOD
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>
EOD;
}

function card_widget($title, $amount, $bgc = 1, $class = "card mb-4"){
    $background_color = array(
        1 => "bg-primary",
        2 => "bg-secondary",
        3 => "bg-tertiary",
        4 => "bg-quaternary",
    );
    $bgc = $background_color[$bgc];
    echo <<<EOD
    <section class="{$class}">
       <div class="card-body {$bgc}">
          <div class="widget-summary">
             <div class="widget-summary-col widget-summary-col-icon">
                <div class="summary-icon">
                   <i class="fas fa-life-ring"></i>
                </div>
             </div>
             <div class="widget-summary-col">
                <div class="summary">
                   <h4 class="title" style="">{$title}</h4>
                   <div class="info">
                      <strong class="amount">{$amount}</strong>
                   </div>
                </div>
                <div class="summary-footer">
                </div>
             </div>
          </div>
       </div>
    </section>
EOD;
 }