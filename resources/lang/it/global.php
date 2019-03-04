<?php

return [
		'user-management' => [		'title' => 'User management',		'fields' => [		],	],
		'permissions' => [		'title' => 'Permissions',		'fields' => [			'title' => 'Title',		],	],
		'roles' => [		'title' => 'Roles',		'fields' => [			'title' => 'Title',			'permission' => 'Permissions',		],	],
		'users' => [		'title' => 'Users',		'fields' => [			'name' => 'Name',			'email' => 'Email',			'password' => 'Password',			'role' => 'Role',			'remember-token' => 'Remember token',		],	],
		'user-actions' => [		'title' => 'User actions',		'created_at' => 'Time',		'fields' => [			'user' => 'User',			'action' => 'Action',			'action-model' => 'Action model',			'action-id' => 'Action id',		],	],
		'time-management' => [		'title' => 'Time management',		'fields' => [		],	],
		'time-work-types' => [		'title' => 'Work types',		'fields' => [		],	],
		'time-projects' => [		'title' => 'Projects',		'fields' => [		],	],
		'time-entries' => [		'title' => 'Time entries',		'fields' => [		],	],
		'time-reports' => [		'title' => 'Reports',		'fields' => [		],	],
		'expense-management' => [		'title' => 'Expense Management',		'fields' => [		],	],
		'expense-category' => [		'title' => 'Expense Categories',		'fields' => [			'name' => 'Name',		],	],
		'income-category' => [		'title' => 'Income categories',		'fields' => [		],	],
		'income' => [		'title' => 'Income',		'fields' => [		],	],
		'expense' => [		'title' => 'Expenses',		'fields' => [		],	],
		'monthly-report' => [		'title' => 'Monthly report',		'fields' => [		],	],
		'contact-management' => [		'title' => 'Contact management',		'fields' => [		],	],
		'contact-companies' => [		'title' => 'Companies',		'fields' => [		],	],
		'contacts' => [		'title' => 'Contacts',		'fields' => [		],	],
		'client-management' => [		'title' => 'Client management',		'fields' => [		],	],
		'client-management-settings' => [		'title' => 'Client management settings',		'fields' => [		],	],
		'client-currencies' => [		'title' => 'Currencies',		'fields' => [		],	],
		'client-transaction-types' => [		'title' => 'Transaction types',		'fields' => [		],	],
		'client-income-sources' => [		'title' => 'Income sources',		'fields' => [		],	],
		'client-statuses' => [		'title' => 'Client statuses',		'fields' => [		],	],
		'client-project-statuses' => [		'title' => 'Project statuses',		'fields' => [		],	],
		'clients' => [		'title' => 'Clients',		'fields' => [		],	],
		'client-projects' => [		'title' => 'Projects',		'fields' => [		],	],
		'client-notes' => [		'title' => 'Notes',		'fields' => [		],	],
		'client-documents' => [		'title' => 'Documents',		'fields' => [		],	],
		'client-transactions' => [		'title' => 'Transactions',		'fields' => [		],	],
		'client-reports' => [		'title' => 'Reports',		'fields' => [		],	],
		'task-management' => [		'title' => 'Task management',		'fields' => [		],	],
		'task-statuses' => [		'title' => 'Statuses',		'fields' => [		],	],
		'task-tags' => [		'title' => 'Tags',		'fields' => [		],	],
		'tasks' => [		'title' => 'Tasks',		'fields' => [		],	],
		'task-calendar' => [		'title' => 'Calendar',		'fields' => [		],	],
		'faq-management' => [		'title' => 'FAQ Management',		'fields' => [		],	],
		'faq-categories' => [		'title' => 'Categories',		'fields' => [			'title' => 'Category',		],	],
		'faq-questions' => [		'title' => 'Questions',		'fields' => [			'category' => 'Category',			'question-text' => 'Question',			'answer-text' => 'Answer',		],	],
		'content-management' => [		'title' => 'Content management',		'fields' => [		],	],
		'content-categories' => [		'title' => 'Categories',		'fields' => [		],	],
		'content-tags' => [		'title' => 'Tags',		'fields' => [		],	],
		'content-pages' => [		'title' => 'Pages',		'fields' => [		],	],
		'internal-notifications' => [		'title' => 'Notifications',		'fields' => [		],	],
		'basic-crm' => [		'title' => 'Basic CRM',		'fields' => [		],	],
		'crm-statuses' => [		'title' => 'Statuses',		'fields' => [		],	],
		'crm-customers' => [		'title' => 'Customers',		'fields' => [		],	],
		'crm-notes' => [		'title' => 'Notes',		'fields' => [		],	],
		'crm-documents' => [		'title' => 'Documents',		'fields' => [		],	],
		'invoice-management' => [		'title' => 'Expense management',		'fields' => [		],	],
		'invoices' => [		'title' => 'Invoices',		'fields' => [		],	],
		'statuses' => [		'title' => 'Statuses',		'fields' => [			'name' => 'Name',		],	],
		'messages' => [		'title' => 'Messages',		'fields' => [			'name' => 'Name',			'email' => 'Email',			'phone' => 'Phone',			'message' => 'Message',		],	],
		'meetings' => [		'title' => 'Meetings',		'fields' => [			'name' => 'Name',			'city' => 'City',			'start-date' => 'Start date',			'end-date' => 'End date',			'project' => 'Project',			'status' => 'Status',		],	],
		'budgets' => [		'title' => 'Budgets',		'fields' => [			'amount' => 'Amount',			'projects' => 'Projects',			'category' => 'Category',			'year' => 'Year',		],	],
		'providers' => [		'title' => 'Providers',		'fields' => [			'name' => 'Name',			'address' => 'Address',			'postal-code' => 'Postal code',			'city' => 'City',			'country' => 'Country',			'phone' => 'Phone',			'contact-person' => 'Contact person',			'email' => 'Email',		],	],
		'categories' => [		'title' => 'Categories',		'fields' => [			'name' => 'Name',		],	],
		'contingencies' => [		'title' => 'Contingencies',		'fields' => [			'name' => 'Name',		],	],
		'expense-types' => [		'title' => 'Expense types',		'fields' => [			'name' => 'Name',		],	],
		'service-types' => [		'title' => 'Service types',		'fields' => [			'name' => 'Name',		],	],
		'years' => [		'title' => 'Years',		'fields' => [			'name' => 'Name',		],	],
		'projects' => [		'title' => 'Projects',		'fields' => [			'name' => 'Name',			'start-date' => 'Start date',			'end-date' => 'End date',			'logo' => 'Logo',			'status' => 'Status',		],	],
		'expenses' => [		'title' => 'Expenses',		'fields' => [			'user' => 'Requester',			'project' => 'Project',			'expense-type' => 'Expense type',			'meeting' => 'Meeting',			'contingency' => 'Contingency',			'date' => 'Date',			'due-date' => 'Due date',			'invoice-subtotal' => 'Invoice subtotal',			'invoice-taxes' => 'Invoice taxes',			'invoice-total' => 'Invoice total',			'budget-subtotal' => 'Budget subtotal',			'budget-taxes' => 'Budget taxes',			'budget-total' => 'Budget total',			'provider' => 'Provider',			'service-type' => 'Service type',			'service' => 'Service',			'selection-criteria' => 'Selection criteria',			'pm' => 'PM',			'pm-approval-date' => 'PM approval date',			'finance' => 'Finance resposible',			'finance-approval-date' => 'Finance approval date',			'files' => 'Files',			'created-by' => 'Created by',		],	],
		'internal-notifications' => [		'title' => 'Notifications',		'fields' => [			'text' => 'Text',			'link' => 'Link',			'users' => 'Users',		],	],
	'app_create' => 'Crea',
	'app_save' => 'Salva',
	'app_edit' => 'Modifca',
	'app_restore' => 'Ripristina',
	'app_permadel' => 'Elimina permanentemente',
	'app_all' => 'Tutti',
	'app_trash' => 'Cestino',
	'app_view' => 'Vedi',
	'app_update' => 'Aggiorna',
	'app_list' => 'Elenco',
	'app_no_entries_in_table' => 'Nessun elemento nella tabella',
	'app_custom_controller_index' => 'Indice del controller personalizzato',
	'app_logout' => 'Logout',
	'app_add_new' => 'Aggiungi nuovo',
	'app_are_you_sure' => 'Sei sicuro?',
	'app_back_to_list' => 'Torna alla lista',
	'app_dashboard' => 'Dashboard',
	'app_delete' => 'Elimina',
	'app_delete_selected' => 'Elimina selezionato',
	'app_category' => 'Categoria',
	'app_categories' => 'Categorie',
	'app_sample_category' => 'Categoria d\'esempio',
	'app_questions' => 'Domande',
	'app_question' => 'Domanda',
	'app_answer' => 'Risposta',
	'app_sample_question' => 'Domanda d\'esempio',
	'app_sample_answer' => 'Risposta d\'esempio',
	'app_faq_management' => 'Gestione FAQ',
	'app_administrator_can_create_other_users' => 'Amministratore (può creare altri utenti)',
	'app_simple_user' => 'Utente semplice',
	'app_title' => 'Titolo',
	'app_roles' => 'Ruoli',
	'app_role' => 'Ruolo',
	'app_user_management' => 'Gestione Utenti',
	'app_users' => 'Utenti',
	'app_user' => 'Utente',
	'app_name' => 'Nome',
	'app_email' => 'Email',
	'app_password' => 'Password',
	'app_remember_token' => 'Remember token',
	'app_permissions' => 'Permessi',
	'app_user_actions' => 'Azioni utente',
	'app_action' => 'Azione',
	'app_action_model' => 'Modello azione',
	'app_action_id' => 'ID azione',
	'app_time' => 'Tempo',
	'app_campaign' => 'Campagna',
	'app_campaigns' => 'Campagne',
	'app_description' => 'Descrizione',
	'app_valid_from' => 'Valido dal',
	'app_valid_to' => 'Valido fino al',
	'app_discount_amount' => 'Sconto',
	'app_discount_percent' => 'Percentuale sconto',
	'app_coupons_amount' => 'Totale coupon',
	'app_coupons' => 'Coupon',
	'app_code' => 'Codice',
	'app_redeem_time' => 'Redeem time',
	'app_coupon_management' => 'Gestione Coupon',
	'app_time_management' => 'Gestione tempo',
	'app_projects' => 'Progetti',
	'app_reports' => 'Report',
	'app_time_entries' => 'Voci orarie',
	'app_work_type' => 'Tipo lavoro',
	'app_work_types' => 'Tipi lavori',
	'app_project' => 'Progetto',
	'app_start_time' => 'Ora inizio',
	'app_end_time' => 'Ora fine',
	'app_expense_category' => 'Categoria Spese',
	'app_expense_categories' => 'Categorie Spese',
	'app_expense_management' => 'Gestione Spese',
	'app_expenses' => 'Spese',
	'app_expense' => 'Spesa',
	'app_entry_date' => 'Data voce',
	'app_amount' => 'Totale',
	'app_income_categories' => 'Categorie introiti',
	'app_monthly_report' => 'Report mensile',
	'app_companies' => 'Compagnie',
	'app_company_name' => 'Nome compagnia',
	'app_address' => 'Indirizzo',
	'app_website' => 'Sito web',
	'app_contact_management' => 'Gestione contatti',
	'app_contacts' => 'Contatti',
	'app_company' => 'Compagnia',
	'app_first_name' => 'Nome',
	'app_last_name' => 'Cognome',
	'app_phone' => 'Telefono',
	'app_phone1' => 'Telefono 1',
	'app_phone2' => 'Telefono 2',
	'app_skype' => 'Skype',
	'app_photo' => 'Foto (max 8mb)',
	'app_category_name' => 'Nome categoria',
	'app_product_management' => 'Gestione prodotti',
	'app_products' => 'Prodotti',
	'app_product_name' => 'Nome prodotto',
	'app_price' => 'Prezzo',
	'app_tags' => 'Tag',
	'app_tag' => 'Tag',
	'app_photo1' => 'Foto1',
	'app_photo2' => 'Foto2',
	'app_photo3' => 'Foto3',
	'app_calendar' => 'Calendario',
	'app_statuses' => 'Stati',
	'app_task_management' => 'Gestione Attività',
	'app_tasks' => 'Attività',
	'app_status' => 'Stato',
	'app_attachment' => 'Allegato',
	'app_due_date' => 'Data consegna',
	'app_assigned_to' => 'Assegnato a',
	'app_assets' => 'Risorse',
	'app_asset' => 'Risorsa',
	'app_serial_number' => 'Numero seriale',
	'app_location' => 'Posizione',
	'app_locations' => 'Posizioni',
	'app_assigned_user' => 'Assegnato (utente)',
	'app_notes' => 'Note',
	'app_assets_history' => 'Cronologia Risorse',
	'app_assets_management' => 'Gestione Risorse',
	'app_slug' => 'Slug',
	'app_content_management' => 'Gestione contenuto',
	'app_text' => 'Testo',
	'app_excerpt' => 'Abbreviazione',
	'app_featured_image' => 'Immagine principale',
	'app_pages' => 'Pagine',
	'app_axis' => 'Asse',
	'app_show' => 'Mostra',
	'app_group_by' => 'Raggruppa per',
	'app_chart_type' => 'Tipologia grafico',
	'app_create_new_report' => 'Crea nuovo report',
	'app_no_reports_yet' => 'Ancora nessun report.',
	'app_created_at' => 'Creato alle',
	'app_updated_at' => 'Aggiornato alle',
	'app_deleted_at' => 'Eliminato alle',
	'app_reports_x_axis_field' => 'Asse-X - per favore scegli uno dei campi data/ora',
	'app_reports_y_axis_field' => 'Asse-Y - per favore scegli uno dei campi numerici',
	'app_select_crud_placeholder' => 'Per favore seleziona uno dei tuoi CRUD',
	'app_select_dt_placeholder' => 'Per favore scegli uno dei campi data/ora',
	'app_aggregate_function_use' => 'Funzione di aggregazione da utilizzare',
	'app_x_axis_group_by' => 'Asse-X raggruppa per',
	'app_x_axis_field' => 'Asse-X campo (data/ora)',
	'app_y_axis_field' => 'Asse-Y campo',
	'app_integer_float_placeholder' => 'Per favore scegli uno dei campi numerici interi o float',
	'app_change_notifications_field_1_label' => 'Invia notifica email all\'Utente',
	'app_change_notifications_field_2_label' => 'Quando un elemento CRUD',
	'app_select_users_placeholder' => 'Per favore seleziona uno dei tuoi utenti',
	'app_is_created' => 'viene creato',
	'app_is_updated' => 'viene aggiornato',
	'app_is_deleted' => 'viene cancellato',
	'app_notifications' => 'Notifiche',
	'app_notify_user' => 'Notifica utente',
	'app_when_crud' => 'Quando CRUD',
	'app_create_new_notification' => 'Crea nuova notifica',
	'app_stripe_transactions' => 'Transazione Stripe',
	'app_upgrade_to_premium' => 'Upgrade a premium',
	'app_messages' => 'Messaggi',
	'app_you_have_no_messages' => 'Non hai messaggi',
	'app_all_messages' => 'Tutti i messaggi',
	'app_new_message' => 'Nuovo messagio',
	'app_outbox' => 'Posta in uscita',
	'app_inbox' => 'Posta in entrata',
	'app_recipient' => 'Casella',
	'app_subject' => 'Oggetto',
	'app_message' => 'Messaggio',
	'app_send' => 'Invia',
	'app_reply' => 'Rispondi',
	'app_calendar_sources' => 'Fonti calendario',
	'app_new_calendar_source' => 'Crea nuova fonte calendario',
	'app_crud_title' => 'Titolo Crud',
	'app_crud_date_field' => 'Campo data Crud',
	'app_prefix' => 'Prefisso',
	'app_label_field' => 'Campo etichetta',
	'app_suffix' => 'Suffisso',
	'app_no_calendar_sources' => 'Ancora nessuna fonte calendario',
	'app_crud_event_field' => 'Campo etichetta evento',
	'app_create_new_calendar_source' => 'Crea una nuova fonte calendario',
	'app_edit_calendar_source' => 'Modifica fonte calendario',
	'app_client_management' => 'Gestione cliente',
	'app_client_management_settings' => 'Impostazioni gestione cliente',
	'app_country' => 'Paese',
	'app_client_status' => 'Stato cliente',
	'app_clients' => 'Clienti',
	'app_client_statuses' => 'Stati cliente',
	'app_currencies' => 'Valute',
	'app_main_currency' => 'Valuta principale',
	'app_documents' => 'Documenti',
	'app_file' => 'File',
	'app_income_source' => 'Fonte di introiti',
	'app_income_sources' => 'Fonti di introiti',
	'app_fee_percent' => 'Tassa percentuale',
	'app_note_text' => 'Nota testuale',
	'app_client' => 'Cliente',
	'app_start_date' => 'Data inizio',
	'app_budget' => 'Budget',
	'app_project_status' => 'Stato progetto',
	'app_project_statuses' => 'Stati progetti',
	'app_transactions' => 'Transazioni',
	'app_transaction_types' => 'Tipi transazione',
	'app_transaction_type' => 'Tipo transazione',
	'app_transaction_date' => 'Data transazione',
	'app_currency' => 'Valuta',
	'app_current_password' => 'Password attuale',
	'app_new_password' => 'Nuova password',
	'app_password_confirm' => 'Conferma nuova password',
	'app_dashboard_text' => 'Sei loggato!',
	'app_forgot_password' => 'Dimenticato la tua password?',
	'app_remember_me' => 'Ricordami',
	'app_login' => 'Login',
	'app_change_password' => 'Cambia password',
	'app_csv' => 'CSV',
	'app_print' => 'Stampa',
	'app_excel' => 'Excel',
	'app_copy' => 'Copia',
	'app_colvis' => 'Visibilità colonna',
	'app_pdf' => 'PDF',
	'app_reset_password' => 'Resetta password',
	'app_reset_password_woops' => '<strong>Oops!</strong> Ci sono stati problem con l\'input:',
	'app_email_line1' => 'Sta ricevendo questa email perché è stato richiesto il reset della password per il suo account.',
	'app_email_line2' => 'Se non ha richiesto il reset della password, nessuna ulteriore azione è richiesta.',
	'app_email_greet' => 'Salve',
	'app_email_regards' => 'Saluti',
	'app_confirm_password' => 'Conferma password',
	'app_if_you_are_having_trouble' => 'Se sta riscontrando problemi cliccando il bottone',
	'app_copy_paste_url_bellow' => ', copi ed incolli il seguente URL nel suo browser:',
	'app_please_select' => 'Per favore seleziona',
	'app_register' => 'Registrati',
	'app_registration' => 'Registrazione',
	'app_not_approved_title' => 'Non è stato approvato',
	'app_not_approved_p' => 'Il suo account non è ancora stato approvato dall\'amministratore. Per favore sii paziente e riprovi più tardi.',
	'app_there_were_problems_with_input' => 'Ci sono stati problemi con l\'input',
	'app_whoops' => 'Ooops!',
	'app_file_contains_header_row' => 'Il file contiene una riga di intestazione?',
	'app_csvImport' => 'Importazione CSV',
	'app_csv_file_to_import' => 'File CSV da importare',
	'app_parse_csv' => 'Processa CSV',
	'app_import_data' => 'Importa dati',
	'app_imported_rows_to_table' => ':rows righe importate nella tabella :table',
	'app_subscription-billing' => 'Sottoiscrizioni',
	'app_subscription-payments' => 'Pagamenti',
	'app_basic_crm' => 'CRM Base',
	'app_customers' => 'Clienti',
	'app_customer' => 'Cliente',
	'app_select_all' => 'Seleziona tutto',
	'app_deselect_all' => 'Deseleziona tutto',
	'app_team-management' => 'Teams',
	'app_team-management-singular' => 'Team',
	'global_title' => 'synapse intranet 3.3',
];