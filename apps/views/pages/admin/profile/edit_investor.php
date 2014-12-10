<?php
//echo "<pre>";print_r($record1);die();
//echo "<pre>";print_r($record);die();
foreach ($record as $temp) {
    $account_type1 = $temp['account_type'];
    $account_category1 = $temp['account_category'];
    $creation_date1 = $temp['creation_date'];
    $activation_date = $temp['investor_activation_date'];
    $in_duration = $temp['investor_duration'];
    $passport_no = $temp['passport_id'];
    $mastul_id = $temp['mastul_id'];
    $withdraw_wal = $temp['withdraw_wal'];
}
foreach ($record1 as $temp121) {
    $status1 = $temp121['status'];
}

$acc_no = array(
    'name' => 'acc_no',
    'id' => 'acc_no',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'value' => '',
    'readonly' => 'readonly',
    'style' => 'border:1px solid #CCC;'
);
$account_creation_date = array(
    'name' => 'account_creation_date',
    'id' => 'account_creation_date',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'value' => '',
    'style' => 'border:1px solid #CCC;'
);
$emp_name = array(
    'name' => 'emp_name',
    'id' => 'emp_name',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'value' => '',
    'style' => 'border:1px solid #CCC;'
);

$password = array(
    'name' => 'password',
    'id' => 'password',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'value' => '',
    'style' => 'border:1px solid #CCC;'
);
$confirm_password = array(
    'name' => 'confirm_password',
    'id' => 'confirm_password',
    'size' => 50,
    'value' => '',
    'style' => 'border:1px solid #CCC;'
);
$email = array(
    'name' => 'email',
    'id' => 'email',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'value' => '',
    'style' => 'border:1px solid #CCC;'
);
$name = array(
    'name' => 'name',
    'id' => 'name',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'value' => '',
    'style' => 'border:1px solid #CCC;'
);
$father_name = array(
    'name' => 'father_name',
    'id' => 'father_name',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'value' => '',
    'style' => 'border:1px solid #CCC;'
);
$mother_name = array(
    'name' => 'mother_name',
    'id' => 'mother_name',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'value' => '',
    'style' => 'border:1px solid #CCC;'
);
$present_address = array(
    'name' => 'present_address',
    'id' => 'present_address',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'value' => '',
    'rows' => '2',
    'cols' => '38',
    'style' => 'border:1px solid #CCC;'
);
$permanent_address = array(
    'name' => 'permanent_address',
    'id' => 'permanent_address',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'value' => '',
    'rows' => '2',
    'cols' => '38',
    'style' => 'border:1px solid #CCC;'
);
$profession_address = array(
    'name' => 'profession_address',
    'id' => 'profession_address',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'value' => '',
    'rows' => '2',
    'cols' => '38',
    'style' => 'border:1px solid #CCC;'
);
$proffession = array(
    'name' => 'proffession',
    'id' => 'proffession',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'value' => '',
    'style' => 'border:1px solid #CCC;'
);
$nationality = array(
    'name' => 'nationality',
    'id' => 'nationality',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'value' => '',
    'style' => 'border:1px solid #CCC;'
);
$national_id = array(
    'name' => 'national_id',
    'id' => 'national_id',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'value' => '',
    'style' => 'border:1px solid #CCC;'
);
$religion = array(
    'name' => 'religion',
    'id' => 'religion',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'value' => '',
    'style' => 'border:1px solid #CCC;'
);
$phone = array(
    'name' => 'phone',
    'id' => 'phone',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'value' => '',
    'style' => 'border:1px solid #CCC;'
);
$userfile = array(
    'name' => 'userfile',
    'id' => 'userfile',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'value' => '',
    'style' => 'border:1px solid #CCC;'
);

$monthly_deposit_amount = array(
    'name' => 'monthly_deposit_amount',
    'id' => 'monthly_deposit_amount',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'value' => '',
    'style' => 'border:1px solid #CCC;'
);
$date_of_birth = array(
    'name' => 'date_of_birth',
    'id' => 'date_of_birth',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'value' => '',
    'style' => 'border:1px solid #CCC;'
);

$nominy_name = array(
    'name' => 'nominy_name',
    'id' => 'nominy_name',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'value' => '',
    'style' => 'border:1px solid #CCC;'
);
$nominy_address = array(
    'name' => 'nominy_address',
    'id' => 'nominy_address',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'value' => '',
    'style' => 'border:1px solid #CCC;'
);
$introducer_name = array(
    'name' => 'introducer_name',
    'id' => 'introducer_name',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'value' => '',
    'style' => 'border:1px solid #CCC;'
);
$introducer_phone = array(
    'name' => 'introducer_phone',
    'id' => 'introducer_phone',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'value' => '',
    'style' => 'border:1px solid #CCC;'
);
$introducer_acc_no = array(
    'name' => 'introducer_acc_no',
    'id' => 'introducer_acc_no',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'value' => '',
    'style' => 'border:1px solid #CCC;'
);
$introducer_relation = array(
    'name' => 'introducer_relation',
    'id' => 'introducer_relation',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'value' => '',
    'style' => 'border:1px solid #CCC;'
);

$relation = array(
    'name' => 'relation',
    'id' => 'relation',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'value' => '',
    'style' => 'border:1px solid #CCC;'
);
$userfile1 = array(
    'name' => 'userfile1',
    'id' => 'userfile1',
    'style' => 'border:1px solid #CCC;',
    'size' => 50,
    'value' => '',
    'style' => 'border:1px solid #CCC;'
);

$account_type = array(
    '1' => 'Master Account',
    '2' => 'Child Account'
);
$account_category = array(
    '1' => 'Owner Account',
    '2' => 'Investor Account'
);
$status = array(
    '1' => 'Active',
    '0' => 'Block'
);

$bg = array('A+' => 'A+',
    'A' => 'A',
    'A-' => 'A-',
    'B+' => 'B+',
    'B-' => 'B-',
    'O+' => 'O+',
    'O-' => 'O-',
    'AB+' => 'AB+',
);
$withdraw = array(
    '' => 'select',
    'yearly' => 'yearly',
    'monthly' => 'monthly'
);
?>

<script type="text/javascript">
    window.onload = function(){
        new JsDatePick({
            useMode:2,
            target:"date_of_birth",
            dateFormat:"%Y-%m-%d"
        });
        new JsDatePick({
            useMode:2,
            target:"activation_date",
            dateFormat:"%Y-%m-%d"
        });
    }
</script>
<?php foreach ($record1 as $info): ?>
    <?php echo form_open_multipart("admin/info/investor_profile_edit"); ?>
    <input type="hidden" name="zone12" value="<?php echo $info['zone']; ?>">
    <?php echo $this->session->flashdata('message'); ?>
    <fieldset>
        <legend align="left">Investor Account Info</legend>
        <table align="center" width="80%"> 
            <tr><td colspan="3"></td></tr>
            <tr>
                <td width="30%" align="left" valign="top"><?php echo form_label('Account No'); ?><span class="markcolor">*</span></td>
                <td width="1%" valign="top">:</td>
                <td width="69%">
                    <?php echo form_input('acc_no', $info['acc_no'], 'readonly'); ?>
                    <span class="markcolor"><?php echo ucwords(form_error('acc_no')); ?></span>               </td>
            </tr>

            <tr><td colspan="3"></td></tr>


            <tr>
                <td align="left" valign="top"><?php echo form_label('Account Type'); ?><span class="markcolor">*</span></td>
                <td valign="top">:</td>
                <td>
                    <input type="text" value="master" readonly="readonly" />
                    <span class="markcolor"></span></td>
            </tr>     

            <tr><td colspan="3"></td></tr>

            <tr><td colspan="3"></td></tr>
            <tr>
                <td align="left" valign="top"><?php echo form_label('Account Category'); ?><span class="markcolor">*</span></td>
                <td valign="top">:</td>
                <td valign="top">
                    <input type="text" value="investor" readonly="readonly" />
                    <span class="markcolor"></span></td>
            </tr>     

            <tr><td colspan="3"></td></tr>
            <tr><td colspan="3"></td></tr>
            <tr>
                <td align="left" valign="top"><?php echo form_label('Account Duration'); ?><span class="markcolor">*</span></td>
                <td valign="top">:</td>
                <td  valign="top">
                    <?php $query89 = $this->db->query("select * from investor_rate order by duration ASC"); ?>

                    <select name="investor_duration" id="investor_duration"  style="width:150px;">
                        <?php foreach ($query89->result() as $info328): ?>
                            <option <?php if ($in_duration == $info328->duration): ?> selected="selected" value="<?php echo $in_duration; ?>" <?php else: ?> value="<?php echo $info328->duration; ?>"<?php endif; ?>><?php echo $info328->duration; ?></option>
                        <?php endforeach; ?>
                    </select> Year
                    <span class="markcolor"><?php echo ucwords(form_error('investor_duration')); ?></span>

                </td>
            </tr>
            <tr><td colspan="3"></td></tr>

            <tr><td colspan="3"></td></tr>
            <tr id="" style="">
                <td align="left" valign="top"><?php echo form_label('Activation Date'); ?><span class="markcolor">*</span></td>
                <td valign="top">:</td>
                <td  valign="top">
                    <input type="text" id="activation_date" name="activation_date" value="<?php echo $activation_date; ?>" />
                    <span class="markcolor"><?php echo ucwords(form_error('activation_date')); ?></span>

                </td>
            </tr>
            <tr><td colspan="3"></td></tr>
           
            <tr><td colspan="3"></td></tr>
            <tr id="" style="">
                <td align="left" valign="top"><?php echo form_label('Passport No'); ?><span class="markcolor">*</span></td>
                <td valign="top">:</td>
                <td  valign="top">
                    <input type="text" id="passport_no" name="passport_no" value="<?php echo $passport_no; ?>" />
                    <span class="markcolor"><?php echo ucwords(form_error('passport_no')); ?></span>

                </td>
            </tr>
            <tr><td colspan="3"></td></tr>
            <tr><td colspan="3"></td></tr>
            <tr id="" style="">
                <td align="left" valign="top"><?php echo form_label('Mastul ID'); ?><span class="markcolor">*</span></td>
                <td valign="top">:</td>
                <td  valign="top">
                    <input type="text" id="mastul_id" name="mastul_id" value="<?php echo $mastul_id; ?>" />
                    <span class="markcolor"><?php echo ucwords(form_error('mastul_id')); ?></span>

                </td>
            </tr>
            <tr><td colspan="3"></td></tr>
            
            <tr><td colspan="3"></td></tr>
            <tr id="" style="">
                <td align="left" valign="top"><?php echo form_label('Type Of withdrawWal'); ?><span class="markcolor">*</span></td>
                <td valign="top">:</td>
                <td  valign="top">
                   <?php echo  form_dropdown('withdraw_wal',$withdraw,$withdraw_wal);?>
                   
                    <span class="markcolor"><?php echo ucwords(form_error('withdraw_wal')); ?></span>

                </td>
            </tr>
            <tr><td colspan="3"></td></tr>
            </tr>

            <tr><td colspan="3"></td></tr>



        </table>

    </fieldset>


    <fieldset>
        <legend align="left">Profile</legend>
        <table align="center" width="80%"> 
            <tr><td colspan="3"></td></tr>
            <tr>
                <td align="left" valign="top"><?php echo form_label('Name'); ?><span class="markcolor">*</span></td>
                <td valign="top">:</td>
                <td>
                    <?php echo form_input('name', $info['name']); ?>
                    <span class="markcolor"><?php echo ucwords(form_error('name')); ?></span>               </td>
            </tr>

            <tr><td colspan="3"></td></tr>
            <tr>
                <td align="left" valign="top"><?php echo form_label('Father/Husband Name'); ?><span class="markcolor">*</span></td>
                <td valign="top">:</td>
                <td>
                    <?php echo form_input('father_name', $info['father_name']); ?>
                    <span class="markcolor"><?php echo ucwords(form_error('father_name')); ?></span> </td>
            </tr>     

            <tr><td colspan="3"></td></tr>
            <tr><td colspan="3"></td></tr>
            <tr>
                <td align="left" valign="top"><?php echo form_label('Mother Name'); ?><span class="markcolor">*</span></td>
                <td valign="top">:</td>
                <td>
                    <?php echo form_input('mother_name', $info['mother_name']); ?>
                    <span class="markcolor"><?php echo ucwords(form_error('mother_name')); ?></span> </td>
            </tr>     

            <tr><td colspan="3"></td></tr>

            <tr><td colspan="3"></td></tr>
            <tr>
                <td></td>
                <td> </td>
            </tr>
            <tr><td colspan="3"></td></tr>
            <tr>
                <td align="left" valign="top"><?php echo form_label('Zone '); ?><span class="markcolor">*</span></td>
                <td valign="top">:</td>
                <td>
                    <?php
                    $query = $this->db->query("select id,zone from zone");
                    ?>

                    <select name="zone" id="zone"  style="width:130px;">
                        <option value="">select</option>
                        <?php foreach ($query->result() as $info32): ?>
                            <option <?php if ($info['zone'] == $info32->id): ?> selected="selected" value="<?php echo $info['zone']; ?>" <?php else : ?>value="<?php echo $info32->id; ?><?php endif; ?>"><?php echo $info32->zone; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <span class="markcolor"><?php echo ucwords(form_error('zone')); ?></span>
                </td>
            </tr>

            <tr><td colspan="3"></td></tr>
            <tr>
                <td align="left" valign="top"><?php echo form_label('Picture'); ?><span class="markcolor">*</span></td>
                <td valign="top">:</td>
                <td >


                    <input type="file" name="photo1" size="20" class="multi" />
                    <span style="padding:0; margin:0"><?php echo '<img style="padding-left:10px" src=' . base_url() . 'uploads/' . $info['photo1'] . ' width="50" />'; ?></span>
                    <span class="markcolor"><?php echo ucwords(form_error('userfile')); ?></span> </td>
            </tr>  

            <tr><td colspan="3"></td></tr>

            <tr><td colspan="3"></td></tr>
            <tr>
                <td align="left" valign="top"><?php echo form_label('Signature'); ?><span class="markcolor">*</span></td>
                <td valign="top">:</td>
                <td >


                    <input type="file" name="photo2" size="20" class="multi" />
                    <span style="padding:0; margin:0"><?php echo '<img style="padding-left:10px" src=' . base_url() . 'uploads/' . $info['photo2'] . ' width="50" />'; ?></span>
                    <span class="markcolor"><?php echo ucwords(form_error('userfile')); ?></span> </td>
            </tr>  

            <tr><td colspan="3"></td></tr> 


            <tr><td colspan="3"></td></tr>
            <tr>
                <td align="left" valign="top"><?php echo form_label('Present Address'); ?><span class="markcolor">*</span></td>
                <td valign="top">:</td>
                <td>
                    <textarea name="present_address" rows="2" cols="38" id="present_address"><?php echo $info['present_address']; ?></textarea>
                    <?php //echo form_textarea('present_address',$info['present_address']);  ?>
                    <span class="markcolor"><?php echo ucwords(form_error('present_address')); ?></span></td>
            </tr>     

            <tr><td colspan="3"></td></tr>
            <tr><td colspan="3"></td></tr>
            <tr>
                <td align="left" valign="top"><?php echo form_label('Permanent Address'); ?><span class="markcolor">*</span></td>
                <td valign="top">:</td>
                <td>
                    <textarea name="permanent_address" rows="2" cols="38" id="permanent_address"><?php echo $info['permanent_address']; ?></textarea>

                    <?php //echo form_textarea($permanent_address);  ?>
                    <span class="markcolor"><?php echo ucwords(form_error('permanent_address')); ?></span></td>
            </tr>     

            <tr><td colspan="3"></td></tr>


            <tr><td colspan="3"></td></tr>
            <tr>
                <td align="left" valign="top"><?php echo form_label('Profession'); ?><span class="markcolor">*</span></td>
                <td valign="top">:</td>
                <td  valign="top">
                    <?php //echo form_input($profession); ?>
                    <?php $query812 = $this->db->query("select * from proffession order by id ASC"); ?>

                    <select name="proffession" id="proffession"  style="width:150px;">
                        <option value="">select</option>
                        <?php foreach ($query812->result() as $info8): ?>
                            <option <?php if ($info['proffession'] == $info8->id): ?> selected="selected" value="<?php echo $info['proffession']; ?>" <?php else: ?> value="<?php echo $info8->id; ?>"<?php endif; ?>><?php echo $info8->name; ?></option>
                        <?php endforeach; ?>
                    </select>

                    <span class="markcolor"><?php echo ucwords(form_error('proffession')); ?></span>

                </td>
            </tr>
            <tr height="10"><td colspan="3"></td></tr>
            <tr><td colspan="3"></td></tr>
            <tr>
                <td align="left" valign="top"><?php echo form_label('Profession Address'); ?><span class="markcolor"></span></td>
                <td valign="top">:</td>
                <td>
                    <textarea name="profession_address" rows="2" cols="38" id="profession_address"><?php echo $info['profession_address']; ?></textarea>

                    <?php //echo form_textarea($profession_address);  ?>
                    <span class="markcolor"><?php echo ucwords(form_error('profession_address')); ?></span></td>
            </tr>     

            <tr><td colspan="3"></td></tr>
            <tr>
                <td align="left" valign="top"><?php echo form_label('Nationality'); ?><span class="markcolor">*</span></td>
                <td valign="top">:</td>
                <td  valign="top">
                    <?php echo form_input('nationality', $info['nationality']); ?>
                    <span class="markcolor"><?php echo ucwords(form_error('nationality')); ?></span>

                </td>
            </tr>

            <tr><td colspan="3"></td></tr>
            <tr><td colspan="3"></td></tr>
            <tr>
                <td align="left" valign="top"><?php echo form_label('Blood Group'); ?><span class="markcolor">*</span></td>
                <td valign="top">:</td>
                <td  valign="top">
                    <?php echo form_dropdown('blood_group', $bg, $info['blood_group']); ?>
                    <span class="markcolor"></span>

                </td>
            </tr>

            <tr><td colspan="3"></td></tr>
            <tr><td colspan="3"></td></tr>
            <tr>
                <td align="left" valign="top"><?php echo form_label('Date Of Birth'); ?><span class="markcolor">*</span></td>
                <td valign="top">:</td>
                <td  valign="top">
                    <input type="text" name="date_of_birth" id="date_of_birth" value="<?php echo $info['date_of_birth']; ?>" />
                    <?php //echo form_input('date_of_birth',$info['date_of_birth'],'date_of_birth');  ?>
                    <span class="markcolor"><?php echo ucwords(form_error('date_of_birth')); ?></span>

                </td>
            </tr>

            <tr><td colspan="3"></td></tr>
            <tr><td colspan="3"></td></tr>
            <tr>
                <td align="left" valign="top"><?php echo form_label('Religion'); ?><span class="markcolor">*</span></td>
                <td valign="top">:</td>
                <td  valign="top">
                    <?php echo form_input('religion', $info['religion']); ?>
                    <span class="markcolor"><?php echo ucwords(form_error('religion')); ?></span>

                </td>
            </tr>

            <tr><td colspan="3"></td></tr>


            <tr><td colspan="3"></td></tr>
            <tr>
                <td align="left" valign="top"><?php echo form_label('National ID'); ?><span class="markcolor"></span></td>
                <td valign="top">:</td>
                <td  valign="top">
                    <?php echo form_input('national_id', $info['national_id']); ?>
                    <span class="markcolor"><?php echo ucwords(form_error('national_id')); ?></span>

                </td>
            </tr>

            <tr><td colspan="3"></td></tr>
            <tr><td colspan="3"></td></tr>
            <tr>
                <td align="left" valign="top"><?php echo form_label('Phone'); ?><span class="markcolor">*</span></td>
                <td valign="top">:</td>
                <td  valign="top">
                    <?php echo form_input('phone', $info['phone']); ?>
                    <span class="markcolor"><?php echo ucwords(form_error('phone')); ?></span>

                </td>
            </tr>

            <tr><td colspan="3"></td></tr>


            <tr>
                <td align="left" valign="top"><?php echo form_label('Email'); ?><span class="markcolor"></span></td>
                <td valign="top">:</td>
                <td>
                    <?php echo form_input('email', $info['email']); ?>
                    <span class="markcolor"><?php echo ucwords(form_error('email')); ?></span>
                </td>
            </tr>

            <tr><td colspan="3"></td></tr>

            <tr><td colspan="3"></td></tr>


            <tr>
                <td align="left" valign="top"><?php echo form_label('Investment Amount'); ?><span class="markcolor">*</span></td>
                <td valign="top">:</td>
                <td>
                    <?php echo form_input('monthly_deposit_amount', $info['monthly_deposit_amount']); ?> Tk
                    <span class="markcolor"><?php echo ucwords(form_error('monthly_deposit_amount')); ?></span>
                </td>
            </tr>

            <tr><td colspan="3"></td></tr>

            <tr><td colspan="3"></td></tr>

        </table>

    </fieldset>
    <fieldset>
        <legend align="left">Nominy Info</legend>
        <table align="center" width="80%"> 
            <tr><td colspan="3"></td></tr>
            <tr>
                <td width="29%" align="left" valign="top"><?php echo form_label('Nominy Name'); ?><span class="markcolor">*</span></td>
                <td width="1%" valign="top">:</td>
                <td width="70%">
                    <?php echo form_input('nominy_name', $info['nominy_name']); ?>
                    <span class="markcolor"><?php echo ucwords(form_error('nominy_name')); ?></span>               </td>
            </tr>

            <tr><td colspan="3"></td></tr>
            <tr><td colspan="3"></td></tr>
            <tr>
                <td align="left" valign="top"><?php echo form_label('Nominy Address'); ?><span class="markcolor">*</span></td>
                <td valign="top">:</td>
                <td>
                    <?php echo form_input('nominy_address', $info['nominy_address']); ?>
                    <span class="markcolor"><?php echo ucwords(form_error('nominy_address')); ?></span>               </td>
            </tr>

            <tr><td colspan="3"></td></tr>


            <tr>
                <td align="left" valign="top"><?php echo form_label('Relation '); ?><span class="markcolor"></span></td>
                <td valign="top">:</td>
                <td>
                    <?php echo form_input('relation', $info['relation']); ?>
                    <span class="markcolor"><?php echo ucwords(form_error('relation')); ?></span></td>
            </tr>     

            <tr><td colspan="3"></td></tr>

            <tr><td colspan="3"></td></tr>
            <tr>
                <td align="left" valign="top"><?php echo form_label('Picture'); ?><span class="markcolor">*</span></td>
                <td valign="top">:</td>
                <td>
                    <input type="file" name="photo3" size="20" class="multi" />
                    <span style="padding:0; margin:0"><?php echo '<img style="padding-left:10px" src=' . base_url() . 'uploads/' . $info['photo3'] . ' width="50" />'; ?></span>

                    <span class="markcolor"><?php echo ucwords(form_error('userfile1')); ?></span> </td>
            </tr>     

            <tr><td colspan="3"></td></tr>
            <tr><td colspan="3"></td></tr>
            <tr>
                <td align="left" valign="top"><?php echo form_label('Signature'); ?><span class="markcolor">*</span></td>
                <td valign="top">:</td>
                <td>
                    <input type="file" name="photo4" size="20" class="multi" />
                    <span style="padding:0; margin:0"><?php echo '<img style="padding-left:10px" src=' . base_url() . 'uploads/' . $info['photo4'] . ' width="50" />'; ?></span>

                    <span class="markcolor"><?php echo ucwords(form_error('userfile1')); ?></span> </td>
            </tr>     

            <tr><td colspan="3"></td></tr>




            <tr><td colspan="3"></td></tr>



        </table>

    </fieldset>
    
    <fieldset>
        <legend align="left">Account Status</legend>
        <table align="center" width="80%"> 

            <tr><td colspan="3"></td></tr>
            <tr>
                <td width="31%" align="left" valign="top"><?php echo form_label('Account Status'); ?><span class="markcolor">*</span></td>
                <td width="1%" valign="top">:</td>
                <td width="68%" valign="top">
                    <?php echo form_dropdown('status', $status, $status1); ?>
                    <span class="markcolor"></span></td>
            </tr>     

            <tr><td colspan="3"></td></tr>

            <tr><td colspan="3"></td></tr>

            <tr>
                <td colspan="2"></td>
                <td>
                    <?php // echo form_submit('mysubmit', 'update'); ?>
                    <input type="submit" name="mysubmit" value="update" class="button1" />


                </td>
            </tr>

        </table>

    </fieldset>

    <?php
    echo form_close();
endforeach;
?>

