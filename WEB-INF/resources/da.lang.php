<?php
// +----------------------------------------------------------------------+
// | Anuko Time Tracker
// +----------------------------------------------------------------------+
// | Copyright (c) Anuko International Ltd. (https://www.anuko.com)
// +----------------------------------------------------------------------+
// | LIBERAL FREEWARE LICENSE: This source code document may be used
// | by anyone for any purpose, and freely redistributed alone or in
// | combination with other software, provided that the license is obeyed.
// |
// | There are only two ways to violate the license:
// |
// | 1. To redistribute this code in source form, with the copyright
// |    notice or license removed or altered. (Distributing in compiled
// |    forms without embedded copyright notices is permitted).
// |
// | 2. To redistribute modified versions of this code in *any* form
// |    that bears insufficient indications that the modifications are
// |    not the work of the original author(s).
// |
// | This license applies to this document only, not any other software
// | that it may be combined with.
// |
// +----------------------------------------------------------------------+
// | Contributors:
// | https://www.anuko.com/time_tracker/credits.htm
// +----------------------------------------------------------------------+

// Note: escape apostrophes with THREE backslashes, like here:  choisir l\\\'option.
// Other characters (such as double-quotes in http links, etc.) do not have to be escaped.

// Note to translators: Please use proper capitalization rules for your language.

$i18n_language = 'Dansk';
$i18n_months = array('Januar', 'Februar', 'Marts', 'April', 'Maj', 'Juni', 'Juli', 'August', 'September', 'Oktober', 'November', 'December');
$i18n_weekdays = array('Søndag', 'Mandag', 'Tirsdag', 'Onsdag', 'Torsdag', 'Fredag', 'Lørdag');
$i18n_weekdays_short = array('Sø', 'Ma', 'Ti', 'On', 'To', 'Fr', 'Lø');
// format mm/dd
$i18n_holidays = array('01/01', '04/09', '04/10', '04/12', '04/13', '05/08', '05/21', '05/31', '06/01', '06/05', '12/24', '12/25', '12/26');

$i18n_key_words = array(

// Menus.
'menu.login' => 'Log ind',
'menu.logout' => 'Log ud',
'menu.forum' => 'Forum',
'menu.help' => 'Hjælp',
'menu.create_team' => 'Lav et team',
'menu.profile' => 'Profil',
'menu.time' => 'Tid',
'menu.expenses' => 'Udgifter',
'menu.reports' => 'Rapporter',
'menu.charts' => 'Diagrammer',
'menu.projects' => 'Projekter',
'menu.tasks' => 'Opgaver',
'menu.users' => 'Brugere',
'menu.teams' => 'Teams',
'menu.export' => 'Eksport',
'menu.clients' => 'Kunder',
'menu.options' => 'Indstillinger',

// Footer - strings on the bottom of most pages.
'footer.contribute_msg' => 'Du kan bidrage til Time Tracker på mange forskellige måder.',
'footer.credits' => 'Medvirkende',
'footer.license' => 'Licens',
'footer.improve' => 'Bidrag',

// Error messages.
'error.access_denied' => 'Adgang nægtet.',
'error.sys' => 'System fejl.',
'error.db' => 'Database fejl.',
'error.field' => 'Forkert "{0}" data.',
'error.empty' => 'Felt "{0}" er tom.',
'error.not_equal' => 'Felt "{0}" er ikke lig med "{1}".',
'error.interval' => 'Felt "{0}" skal være større end "{1}".',
'error.project' => 'Vælg projekt.',
'error.task' => 'Vælg opgave.',
'error.client' => 'Vælg klient.',
'error.report' => 'Vælg rapport.',
'error.auth' => 'Forkert brugernavn eller adgangskode.',
'error.user_exists' => 'Brugernavn eksistere allerede.',
'error.project_exists' => 'Der eksiterer allerede et projekt med det navn.',
'error.task_exists' => 'Opgavenavn eksistere allerede.',
'error.client_exists' => 'Der eksistere allerede en klient med dette navn.',
'error.invoice_exists' => 'Fakturanummer eksistere allerede.',
'error.no_invoiceable_items' => 'Der er ingen fakturerbar emner.',
'error.no_login' => 'Der finde ingen bruger med dette brugernavn.',
'error.no_teams' => 'Din database er tom, log ind som administrator og lav et nyt team.',
'error.upload' => 'Fil upload problem.',
'error.range_locked' => 'Dato interval er spærret.',
'error.mail_send' => 'Fejl under sending af mail.',
'error.no_email' => 'Der er ingen email tilknyttet dette brugernavn.',
'error.uncompleted_exists' => 'Uafsluttet registrering eksistere allerede. Luk eller slet det.',
'error.goto_uncompleted' => 'Gå til uafsluttet registrering.',
'error.overlap' => 'Tidsinterval overlapper eksisterende poster.',
'error.future_date' => 'Datoen er ud i fremtiden.',

// Labels for buttons.
'button.login' => 'Log ind',
'button.now' => 'Nu',
'button.save' => 'Gem',
'button.copy' => 'Kopiér',
'button.cancel' => 'Fortryd',
'button.submit' => 'Gem',
'button.add_user' => 'Tilføj bruger',
'button.add_project' => 'Tilføj project',
'button.add_task' => 'Tilføj opgave',
'button.add_client' => 'Tilføj kunde',
'button.add_invoice' => 'Tilføj faktura',
'button.add_option' => 'Tilføj mulighed',
'button.add' => 'Tilføj',
'button.generate' => 'Generer',
'button.reset_password' => 'Nulstil adgangskode',
'button.send' => 'Send',
'button.send_by_email' => 'Send som e-mail',
'button.create_team' => 'Lav et team',
'button.export' => 'Eksporter team',
'button.import' => 'Importer team',
'button.close' => 'Luk',
'button.stop' => 'Stop',

// Labels for controls on forms. Labels in this section are used on multiple forms.
'label.team_name' => 'Team navn',
'label.address' => 'Adresse',
'label.currency' => 'Valuta',
'label.manager_name' => 'Manager navn',
'label.manager_login' => 'Manager brugernavn',
'label.person_name' => 'Navn',
'label.thing_name' => 'Navn',
'label.login' => 'Login',
'label.password' => 'Adgangskode',
'label.confirm_password' => 'Gentag adgangskode',
'label.email' => 'E-mail',
'label.cc' => 'Cc',
// TODO: translate the following.
// 'label.bcc' => 'Bcc',
'label.subject' => 'Emne',
'label.date' => 'Dato',
'label.start_date' => 'Start dato',
'label.end_date' => 'Slut dato',
'label.user' => 'Bruger',
'label.users' => 'Brugere',
'label.client' => 'Klient',
'label.clients' => 'Klienter',
'label.option' => 'Mulighed',
'label.invoice' => 'Faktura',
'label.project' => 'Projekt',
'label.projects' => 'Projekter',
'label.task' => 'Opgave',
'label.tasks' => 'Opgaver',
'label.description' => 'Beskrivelse',
'label.start' => 'Start',
'label.finish' => 'Slut',
'label.duration' => 'Varighed',
'label.note' => 'Notat',
'label.item' => 'Emne',
'label.cost' => 'Pris',
'label.day_total' => 'Dagens total',
'label.week_total' => 'Ugens total',
'label.month_total' => 'Måneds total',
'label.today' => 'Idag',
'label.total_hours' => 'Timer total',
'label.total_cost' => 'Total pris',
'label.view' => 'Udseende',
'label.edit' => 'Rediger',
'label.delete' => 'Slet',
'label.configure' => 'Konfigurer',
'label.select_all' => 'Vælg alle',
'label.select_none' => 'Frevælg alle',
'label.id' => 'ID',
'label.language' => 'Sprog',
'label.decimal_mark' => 'Decimal tegn',
'label.date_format' => 'Dato format',
'label.time_format' => 'Tids format',
'label.week_start' => 'Første dag i ugen',
'label.comment' => 'Kommentar',
'label.status' => 'Status',
'label.tax' => 'Moms',
'label.subtotal' => 'Subtotal',
'label.total' => 'Total',
'label.client_name' => 'Klient name',
'label.client_address' => 'Klient adresse',
'label.or' => 'eller',
'label.error' => 'Fejl',
'label.ldap_hint' => 'Skriv dit <b>Windows brugernavn</b> eller <b>adgangskode</b> i felterne her under.',
'label.required_fields' => '* - obligatorisk felt',
'label.on_behalf' => 'på vegne af',
'label.role_manager' => '(Manager)',
'label.role_comanager' => '(Co-Manager)',
'label.role_admin' => '(Administrator)',
'label.page' => 'Side',
'label.condition' => 'Betingelse',
// Labels for plugins (extensions to Time Tracker that provide additional features).
'label.custom_fields' => 'Brugerdefineret felt',
'label.monthly_quotas' => 'Månedlig kvota',
'label.type' => 'Type',
'label.type_dropdown' => 'Dropdown',
'label.type_text' => 'Tekst',
'label.required' => 'Required',
'label.fav_report' => 'Favorit rapport',
'label.cron_schedule' => 'Cron tidsplan',
'label.what_is_it' => 'Hvad er det?',
'label.expense' => 'Udgift',
'label.quantity' => 'Mængde',

// Form titles.
'title.login' => 'Login',
'title.teams' => 'Teams',
'title.create_team' => 'Opret Team',
'title.edit_team' => 'Redigér Team',
'title.delete_team' => 'Slet Team',
'title.reset_password' => 'Nulstilling af Adgangskode',
'title.change_password' => 'Skift af Adgangskode',
'title.time' => 'Tid',
'title.edit_time_record' => 'Redigér Tidsregistrering',
'title.delete_time_record' => 'Slet Tidsregistrering',
'title.expenses' => 'Udgifter',
'title.edit_expense' => 'Redigér Udgift',
'title.delete_expense' => 'Slet Udgift',
'title.predefined_expenses' => 'Predefinerede Udgifter',
'title.add_predefined_expense' => 'Tilføj Predefinerede Udgifter',
'title.edit_predefined_expense' => 'Redigér Predefinerede Udgifter',
'title.delete_predefined_expense' => 'Slet Predefinerede Udgifter',
'title.reports' => 'Rapporter',
'title.report' => 'Rapport',
'title.send_report' => 'Sender Rapport',
'title.invoice' => 'Faktura',
'title.send_invoice' => 'Sender Faktura',
'title.charts' => 'Diagrammer',
'title.projects' => 'Projekter',
'title.add_project' => 'Tilføj Projekt',
'title.edit_project' => 'Redigér Projekt',
'title.delete_project' => 'Slet Projekt',
'title.tasks' => 'Opgaver',
'title.add_task' => 'Tilføj Opgave',
'title.edit_task' => 'Redigér Opgave',
'title.delete_task' => 'Slet Opgave',
'title.users' => 'Brugere',
'title.add_user' => 'Tilføj Bruger',
'title.edit_user' => 'Redigér Bruger',
'title.delete_user' => 'Slet Bruger',
'title.clients' => 'Klienter',
'title.add_client' => 'Tilføj Klient',
'title.edit_client' => 'Redigér Klient',
'title.delete_client' => 'Slet Klient',
'title.invoices' => 'Faktura',
'title.add_invoice' => 'Tilføj Faktura',
'title.view_invoice' => 'Vis Faktura',
'title.delete_invoice' => 'Slet Faktura',
'title.notifications' => 'Meddelelser',
'title.add_notification' => 'Tilføj Meddelelse',
'title.edit_notification' => 'Redigér Meddelelse',
'title.delete_notification' => 'Slet Meddelelse',
'title.monthly_quotas' => 'Månedlig Kvota',
'title.export' => 'Eksporter Team Data',
'title.import' => 'Importer Team Data',
'title.options' => 'Indstillinger',
'title.profile' => 'Profil',
'title.cf_custom_fields' => 'Brugerdefineret Felt',
'title.cf_add_custom_field' => 'Tilføj Brugerdefineret Felt',
'title.cf_edit_custom_field' => 'Redigér Brugerdefineret Felt',
'title.cf_delete_custom_field' => 'Slet Brugerdefineret Felt',
'title.cf_dropdown_options' => 'Dropdown Muligheder',
'title.cf_add_dropdown_option' => 'Tilføj Mulighed',
'title.cf_edit_dropdown_option' => 'Redigér Mulighed',
'title.cf_delete_dropdown_option' => 'Slet Mulighed',
'title.locking' => 'Lås Registring',

// Section for common strings inside combo boxes on forms. Strings shared between forms shall be placed here.
// Strings that are used in a single form must go to the specific form section.
'dropdown.all' => '--- Alle ---',
'dropdown.no' => '--- Ingen ---',
// TODO: translate the following.
// 'dropdown.current_day' => 'today',
// 'dropdown.previous_day' => 'yesterday',
'dropdown.selected_day' => 'dag',
'dropdown.current_week' => 'Denne uge',
'dropdown.previous_week' => 'Sidste uge',
'dropdown.selected_week' => 'uge',
'dropdown.current_month' => 'Denne måned',
'dropdown.previous_month' => 'Sidste måned',
'dropdown.selected_month' => 'måned',
'dropdown.current_year' => 'Dette år',
// TODO: translate the following.
// 'dropdown.previous_year' => 'previous year',
'dropdown.selected_year' => 'år',
'dropdown.all_time' => 'Alt',
'dropdown.projects' => 'Projekter',
'dropdown.tasks' => 'Opgaver',
'dropdown.clients' => 'Klienter',
'dropdown.select' => '--- Vælg ---',
'dropdown.select_invoice' => '--- Vælg faktura ---',
'dropdown.status_active' => 'Aktive',
'dropdown.status_inactive' => 'Inaktive',
'dropdown.delete'=>'Slet',
'dropdown.do_not_delete'=>'Slet ikke',

// Login form. See example at https://timetracker.anuko.com/login.php.
'form.login.forgot_password' => 'Har du glemt din adgangskode?',
'form.login.about' =>'Anuko <a href="https://www.anuko.com/lp/tt_2.htm" target="_blank">Time Tracker</a> er et nemt, let at bruge, open source tidsregistrerings system.',

// Resetting Password form. See example at https://timetracker.anuko.com/password_reset.php.
'form.reset_password.message' => 'Nulstilling af adgangskode er sendt på email.',
'form.reset_password.email_subject' => 'Anuko Time Tracker - Anmodning om nulstilling af adgangskode',
'form.reset_password.email_body' => "Hej\n\nNogen, formodentlig dig, har bedt om at få nulstillet din adgangskode. Tryk på linket hvis du vil have nulstillet din adgangskode.\n\n%s\n\nAnuko Time Tracker er et nemt, let at bruge, open source tidsregistrerings system. Besøg https://www.anuko.com for mere information.\n\n",

// Changing Password form. See example at https://timetracker.anuko.com/password_change.php?ref=1.
'form.change_password.tip' => 'Skriv en ny adgangskode og tryk Gem.',

// Time form. See example at https://timetracker.anuko.com/time.php.
'form.time.duration_format' => '(tt:mm or 0.0)',
'form.time.billable' => 'Fakturerbar',
'form.time.uncompleted' => 'Uafsluttet',
'form.time.remaining_quota' => 'Resterende kvota',
'form.time.over_quota' => 'Over kvota',

// Editing Time Record form. See example at https://timetracker.anuko.com/time_edit.php (get there by editing an uncompleted time record).
'form.time_edit.uncompleted' => 'Denne post blev kun gemt med starttidspunkt. Det er ikke en fejl.',

// Reports form. See example at https://timetracker.anuko.com/reports.php
'form.reports.save_as_favorite' => 'Gem som favorit',
'form.reports.confirm_delete' => 'Er du sikker på at du vil slette denne favorit rapport?',
'form.reports.include_records' => 'Inkluder poster',
'form.reports.include_billable' => 'Fakturerbar',
'form.reports.include_not_billable' => 'Ikke fakturerbar',
'form.reports.include_invoiced' => 'Faktureret',
'form.reports.include_not_invoiced' => 'Ikke faktureret',
'form.reports.select_period' => 'Vælg en periode',
'form.reports.set_period' => 'eller sæt datoer',
'form.reports.show_fields' => 'Vis felter',
'form.reports.group_by' => 'Gruppér ved',
'form.reports.group_by_no' => '--- Ingen gruppereing ---',
'form.reports.group_by_date' => 'Dato',
'form.reports.group_by_user' => 'Bruger',
'form.reports.group_by_client' => 'Klient',
'form.reports.group_by_project' => 'Projekt',
'form.reports.group_by_task' => 'Opgave',
'form.reports.totals_only' => 'Kun Total',

// Report form. See example at https://timetracker.anuko.com/report.php
// (after generating a report at https://timetracker.anuko.com/reports.php).
'form.report.export' => 'Eksport',

// Invoice form. See example at https://timetracker.anuko.com/invoice.php
// (you can get to this form after generating a report).
'form.invoice.number' => 'Fakturanummer',
'form.invoice.person' => 'Person',
'form.invoice.invoice_to_delete' => 'Faktura der skal slettes',
'form.invoice.invoice_entries' => 'Faktura emner',

// Charts form. See example at https://timetracker.anuko.com/charts.php
'form.charts.interval' => 'Interval',
'form.charts.chart' => 'Diagram',

// Projects form. See example at https://timetracker.anuko.com/projects.php
'form.projects.active_projects' => 'Aktive Projecter',
'form.projects.inactive_projects' => 'Inaktive Projekter',

// Tasks form. See example at https://timetracker.anuko.com/tasks.php
'form.tasks.active_tasks' => 'Aktive Opgaver',
'form.tasks.inactive_tasks' => 'Inaktive Opgaver',

// Users form. See example at https://timetracker.anuko.com/users.php
'form.users.active_users' => 'Aktive Brugere',
'form.users.inactive_users' => 'Inaktive Brugere',
'form.users.uncompleted_entry' => 'Bruger har en uafsluttet tidsregistrering',
'form.users.role' => 'Rolle',
'form.users.manager' => 'Manager',
'form.users.comanager' => 'Co-Manager',
'form.users.rate' => 'Sats',
'form.users.default_rate' => 'Standard Time Sats',

// Client delete form. See example at https://timetracker.anuko.com/client_delete.php
'form.client.client_to_delete' => 'Klient der skal slettes',
'form.client.client_entries' => 'Klient indlæg',

// Clients form. See example at https://timetracker.anuko.com/clients.php
'form.clients.active_clients' => 'Aktive Klienter',
'form.clients.inactive_clients' => 'Inaktive Klienter',

// Strings for Exporting Team Data form. See example at https://timetracker.anuko.com/export.php
'form.export.hint' => 'Du kan eksportere alle Teamdata til en xml-fil. Det kan være nyttigt, hvis du migrerer data til din egen server.',
'form.export.compression' => 'Komprimering',
'form.export.compression_none' => 'Ingen',
'form.export.compression_bzip' => 'bzip',

// Strings for Importing Team Data form. See example at https://timetracker.anuko.com/imort.php (login as admin first).
'form.import.hint' => 'Importer teamdata fra en xml-fil.',
'form.import.file' => 'Vælg fil',
'form.import.success' => 'Import sluttede med succes.',

// Teams form. See example at https://timetracker.anuko.com/admin_teams.php (login as admin first).
'form.teams.hint' =>  'Opret et nyt team ved at oprette en ny teamadministrator konto. <br> Du kan også importere teamdata fra en xml-fil fra en anden Anuko Time Tracker-server (eksisterende brugernavne er ikke tilladt).',

// Profile form. See example at https://timetracker.anuko.com/profile_edit.php.
'form.profile.12_hours' => '12 timers',
'form.profile.24_hours' => '24 timers',
'form.profile.tracking_mode' => 'Registrerings tilstand',
'form.profile.mode_time' => 'Tid',
'form.profile.mode_projects' => 'Projekter',
'form.profile.mode_projects_and_tasks' => 'Projekter og opgaver',
'form.profile.record_type' => 'Registrerings type',
'form.profile.uncompleted_indicators' => 'Uafsluttede indikatore',
'form.profile.uncompleted_indicators_none' => 'Vis ikke',
'form.profile.uncompleted_indicators_show' => 'Vis',
'form.profile.type_all' => 'Alle',
'form.profile.type_start_finish' => 'Start og slut',
'form.profile.type_duration' => 'Varighed',
'form.profile.plugins' => 'Plugins',

// Mail form. See example at https://timetracker.anuko.com/report_send.php when emailing a report.
'form.mail.from' => 'Fra',
'form.mail.to' => 'Til',
'form.mail.report_subject' => 'Tidsregistrerings Rapport',
'form.mail.footer' => 'Anuko Time Tracker er et simpelt, let at bruge, open source<br>tidsregistrerings system. Besøg <a href="https://www.anuko.com">www.anuko.com</a> for mere information.',
'form.mail.report_sent' => 'Rapport sendt.',
'form.mail.invoice_sent' => 'Faktura sendt.',

// Quotas configuration form.
'form.quota.year' => 'År',
'form.quota.month' => 'Måned',
'form.quota.quota' => 'Kvota',
'form.quota.workday_hours' => 'Timer på en arbejdsdag',
'form.quota.hint' => 'Hvis værdierne er tomme, beregnes kvoter automatisk baseret på arbejdsdage og helligdage.',
);

