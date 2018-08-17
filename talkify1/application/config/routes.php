<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "auth/login";
$route['accessdenied'] ='accessdenied/index';
$route['logout'] ='auth/logout';
$route['404_override'] = '';

//registration
$route['registration'] = 'demoregistration/index';
$route['forgot-pass'] = 'auth/forgot_password';
$route['reset-pass/(.*)'] = 'auth/reset_password/$1';

//leads
$route['dellead'] = 'inbox/delete_lead';
$route['active-leads']= 'inbox/browseInbox';
$route['show-deleted'] = 'inbox/deletedLeads';
$route['deletedleads'] ='inbox/browseDeltedLeads';
$route['show-reopen'] = 'inbox/reopen_lead';

//All related to category 	
$route['reps-view'] = 'reps/read';
$route['clients-view'] = 'clients/read';
$route['category-view'] = 'category/read';
$route['priority-view'] = 'priority/read';
$route['channel-view'] = 'channel/read';
$route['types-view'] = 'types/read';
$route['status-view'] = 'status/read';
$route['sms-view'] = 'clients/read';
$route['emails-view'] = 'clients/read';
$route['compose-view'] = 'clients/read';

$route['show-dashboard'] = 'dashboard/index';
$route['show-compose'] = 'compose/index';
$route['show-inbox'] = 'inbox/index';
$route['show-sms'] = 'sms/index';
$route['show-emails'] = 'emails/index';
$route['show-tasks'] = 'tasks/index';
$route['show-company'] = 'company/index';
$route['show-reports'] = 'reports/index';
$route['show-day'] = 'day/index';

$route['show-reps'] = 'reps/index';
$route['show-clients'] = 'clients/index';
$route['show-roles'] = 'roleofemp/index';
$route['Add-New-Role'] = 'roleofemp/insertRole';
//$route['edit-Role'] = 'roleofemp/updateRole/[*]';
$route['show-category'] = 'category/index';
$route['show-types'] = 'types/index';
$route['show-status'] = 'status/index';
$route['show-channel'] = 'channel/index';
$route['show-priority'] = 'priority/index';
$route['show-sms'] = 'sms/index';
$route['show-emails'] = 'emails/index';
$route['show-tasks'] = 'tasks/index';
$route['show-emaillist'] = 'emaillist/index';
$route['show-escilation'] = 'escilation/index';
$route['show-charts'] = 'charts/index';
$route['show-sample'] = 'sample/index';

$route['show-dashboarddetails'] = 'dashboarddetails/index';
$route['show-repdashboard'] = 'repdashboard/index';
$route['show-statusdashboard'] = 'statusdashboard/index';
$route['show-repreports'] = 'reports/repsvsstatus';
$route['show-responder'] = 'autoresponder/index';
$route['show-smsresponder'] = 'autorespondersms/index';

//graphs
$route['graph-category']= 'graphs/leadvscategorygraph';
$route['graph-channel']= 'graphs/leadvschannelgraph';
$route['graph-priority']= 'graphs/leadvsprioritygraph';
$route['graph-status']= 'graphs/leadvsstatusgraph';
$route['graph-types']= 'graphs/leadvstypegraph';

$route['show-repvsstatus'] = 'repreports/repsvsstatus';
$route['show-repvscategory'] = 'repreports/repsvscategory';
$route['show-repvstypes'] = 'repreports/repsvstypes';
$route['show-repvspriority'] = 'repreports/repsvspriority';
$route['show-repvschannels'] = 'repreports/repsvschannels';
$route['update-role/(.*)'] = 'roleofemp/updateRole/$1';

//superadmin modules
$route['show-modules']= 'superadmin/modules_display/index';
$route['listallmodules'] = 'superadmin/modules_display/listAllCompany';
$route['edit-modules/(.*)'] = 'superadmin/modules_display/updateRole/$1';

$route['show-repdetails'] = 'superadmin/repdetails_display/index';
$route['listallreps'] = 'superadmin/repdetails_display/listAllReps';
$route['edit-reps/(.*)'] = 'superadmin/repdetails_display/updateReps/$1';

$route['show-callrerports'] = 'superadmin/callreports/index';
$route['listallcalls'] = 'superadmin/callreports/listtAllCalls';

$route['show-emailsreport'] = 'superadmin/emailreports/index';

$route['show-smsreports'] = 'superadmin/smsreports/index';

$route['show-superreports'] = 'superadmin/reports/index';

$route['show-errorlog'] = 'superadmin/errorlogs/index';

$route['show-notification'] = 'superadmin/notifications/index';

/* End of file routes.php */
/* Location: ./application/config/routes.php */