<?php

use App\Model\Constituency;
use App\Model\Designation;
use App\Model\District;
use App\Model\Division;
use App\Model\MenuPermission;
use App\Model\Parliament;
use App\Model\PoliticalParty;
use Illuminate\Support\Facades\Schema;

// dont delete or edit this function anyone please
if (!function_exists('includeRouteFiles')) {
    /**
     * Loops through a folder and requires all PHP files
     * Searches sub-directories as well.
     *
     * @param $folder
     */
    function includeRouteFiles($folder)
    {
        try {
            $rdi = new recursiveDirectoryIterator($folder);
            $it = new recursiveIteratorIterator($rdi);

            while ($it->valid()) {
                if (!$it->isDot() && $it->isFile() && $it->isReadable() && $it->current()->getExtension() === 'php') {
                    require $it->key();
                }
                $it->next();
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}

if (!function_exists('inner_permission')) {
    function inner_permission($permitted_route)
    {
        if (Auth::user()->id == '1') {
            return true;
        }

        $user_role_array = Auth::user()->user_role;
        if (count($user_role_array) == 0) {
            $user_role = [];
        } else {
            foreach ($user_role_array as $rolee) {
                $user_role[] = $rolee->role_id;
            }
        }

        $existpermission = MenuPermission::where('permitted_route', $permitted_route)->whereIn('role_id', @$user_role)->first();
        if ($existpermission) {
            return true;
        } else {
            return false;
        }
    }
}

if (!function_exists('approvedStatus')) {
    function approvedStatus($value)
    {
        if ($value == 1) {
            $output = '<span class="badge badge-success">Approved</span>';
        } elseif ($value == 2) {
            $output = '<span class="badge badge-danger">Rejected</span>';
        } elseif ($value == 3) {
            $output = '<span class="badge badge-warning">Draft</span>';
        } else {
            $output = '<span class="badge badge-warning">Pending</span>';
        }
        return $output;
    }
}

if (!function_exists('maritalStatusDropdown')) {
    function maritalStatusDropdown($editStatus = null)
    {
        $meritals = ["Unmarried", "Married", "Divorced", "Widowed"];

        $html = '<option value="">Select marital status</option>';
        foreach ($meritals as $key => $merital) {
            if ($editStatus == $merital) {
                $selected = 'selected';
            } else {
                $selected = '';
            }
            $html .= '<option ' . $selected . ' value="' . $merital . '">' . $merital . '</option>';
        }

        return $html;
    }
}

if (!function_exists('religionDropdown')) {
    function religionDropdown($editReligion = null)
    {
        $religions = ['Islam', 'Hindu', 'Christian', 'Buddisht'];

        $html = '<option value="">Select religion</option>';
        foreach ($religions as $key => $religion) {
            if ($editReligion == $religion) {
                $selected = 'selected';
            } else {
                $selected = '';
            }
            $html .= '<option ' . $selected . ' value="' . $religion . '">' . $religion . '</option>';
        }

        return $html;
    }
}

if (!function_exists('statusDropdown')) {
    function statusDropdown($editStatus = null)
    {
        $datas = ['0' => 'Pending', '1' => 'Approved', '2' => 'Rejected'];
        $html = '<option value="">Select status</option>';
        foreach ($datas as $key => $data) {
            if ($editStatus == $key) {
                $selected = 'selected';
            } else {
                $selected = '';
            }
            $html .= '<option ' . $selected . ' value="' . $key . '">' . $data . '</option>';
        }
        return $html;
    }
}

if (!function_exists('activeStatusDropdown')) {
    function activeStatusDropdown($editStatus = null)
    {
        $datas = ['0' => 'Inactive', '1' => 'Active'];
        $html = '<option value="">Select status</option>';
        foreach ($datas as $key => $data) {
            if ($editStatus == $key) {
                $selected = 'selected';
            } else {
                $selected = '';
            }
            $html .= '<option ' . $selected . ' value="' . $key . '">' . $data . '</option>';
        }
        return $html;
    }
}

if (!function_exists('designationDropdown')) {
    function designationDropdown($selectedId = null)
    {
        if (Schema::hasTable('designations')) {
            $designations = Designation::all();
            if (isset($designations) && count($designations) > 0) {
                $output = '<option value="">Select Designation</option>';
                foreach ($designations as $key => $designation) {
                    if ($selectedId && $selectedId == $designation->id) {
                        $selected = 'selected';
                    } else {
                        $selected = '';
                    }
                    $output .= '<option ' . $selected . ' value="' . $designation->id . '">' . $designation->name . '</option>';
                }
            } else {
                $output = '<option value="">No data available</option>';
            }
            return $output;
        }
    }
}

if (!function_exists('parliamentDropdown')) {
    function parliamentDropdown($selectedId = null)
    {
        if (Schema::hasTable('parliaments')) {
            $parliaments = Parliament::all();
            if (isset($parliaments) && count($parliaments) > 0) {
                $output = '<option value="">Select Parliament</option>';
                foreach ($parliaments as $key => $parliament) {
                    if ($selectedId && $selectedId == $parliament->id) {
                        $selected = 'selected';
                    } else {
                        $selected = '';
                    }
                    $output .= '<option ' . $selected . ' value="' . $parliament->id . '">' . $parliament->parliament_number . '</option>';
                }
            } else {
                $output = '<option value="">No data available</option>';
            }
            return $output;
        }
    }
}

if (!function_exists('politicalPartiesDropdown')) {
    function politicalPartiesDropdown($selectedId = null)
    {
        if (Schema::hasTable('political_parties')) {
            $politicalParties = PoliticalParty::all();
            if (isset($politicalParties) && count($politicalParties) > 0) {
                $output = '<option value="">Select political party</option>';
                foreach ($politicalParties as $key => $politicalParty) {
                    if ($selectedId && $selectedId == $politicalParty->id) {
                        $selected = 'selected';
                    } else {
                        $selected = '';
                    }
                    $output .= '<option ' . $selected . ' value="' . $politicalParty->id . '">' . $politicalParty->name . '</option>';
                }
            } else {
                $output = '<option value="">No data available</option>';
            }
            return $output;
        }
    }
}

if (!function_exists('divisionDropdown')) {
    function divisionDropdown($selectedId = null)
    {
        if (Schema::hasTable('divisions')) {
            $divisions = Division::all();
            if (isset($divisions) && count($divisions) > 0) {
                $output = '<option value="">Select Division</option>';
                foreach ($divisions as $key => $division) {
                    if ($selectedId && $selectedId == $division->id) {
                        $selected = 'selected';
                    } else {
                        $selected = '';
                    }
                    $output .= '<option ' . $selected . ' value="' . $division->id . '">' . $division->name . '</option>';
                }
            } else {
                $output = '<option value="">No data available</option>';
            }
            return $output;
        }
    }
}
if (!function_exists('districtDropdown')) {
    function districtDropdown($selectedId = null)
    {
        if (Schema::hasTable('districts')) {
            $districts = District::all();
            if (isset($districts) && count($districts) > 0) {
                $output = '<option value="">Select District</option>';
                foreach ($districts as $key => $district) {
                    if ($selectedId && $selectedId == $district->id) {
                        $selected = 'selected';
                    } else {
                        $selected = '';
                    }
                    $output .= '<option ' . $selected . ' value="' . $district->id . '">' . $district->name . '</option>';
                }
            } else {
                $output = '<option value="">No data available</option>';
            }
            return $output;
        }
    }
}

if (!function_exists('constituenciesDropdown')) {
    function constituenciesDropdown()
    {
        if (Schema::hasTable('constituencies')) {
            $constituencies = Constituency::all();
            if (isset($constituencies) && count($constituencies) > 0) {
                $output = '<option value="">Select Constituency</option>';
                foreach ($constituencies as $key => $constituency) {
                    $output .= '<option value="' . $constituency->id . '">' . $constituency->name . '</option>';
                }
            } else {
                $output = '<option value="">No data available</option>';
            }
            return $output;
        }
    }
}


if (!function_exists('activeStatus')) {
    function activeStatus($value)
    {
        if ($value == 1) {
            $output = '<span class="badge badge-success">Active</span>';
        } else {
            $output = '<span class="badge badge-danger">Inactive</span>';
        }
        return $output;
    }
}
