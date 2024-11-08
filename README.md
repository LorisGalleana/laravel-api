# LARAVEL API - Gestione dei Progetti e delle Relazioni con Tipologie e Tecnologie

## Descrizione

**Laravel API** è un'applicazione sviluppata con **Laravel 10** che espone un'API RESTful per gestire e visualizzare informazioni sui progetti. Ogni progetto può essere associato a una tipologia e a delle tecnologie. L'API consente di recuperare progetti, tipologie e tecnologie in formato JSON, con alcune funzionalità aggiuntive come la gestione dei progetti tramite tipologia e tecnologia, e il dettaglio dei progetti tramite slug.

## Funzionalità

### API disponibili:

- **Elenco di tutti i progetti**:
  - Recupera tutti i progetti con il loro tipo e le tecnologie associate. 
  - Supporta la paginazione opzionale.
  
- **Elenco di tutte le tecnologie**:
  - Restituisce un elenco di tutte le tecnologie presenti nel database.
  
- **Elenco di tutti i tipi**:
  - Restituisce un elenco di tutte le tipologie di progetto.

### Funzionalità Bonus:

- **Dettaglio del singolo progetto**:
  - Restituisce il dettaglio di un singolo progetto dato il suo **slug**, con informazioni sulle tecnologie e il tipo associato.
  - Gestisce la situazione in cui il progetto o l'immagine non siano presenti.

- **Filtraggio dei progetti per tipologia**:
  - Elenco dei progetti filtrato per tipologia.
  
- **Filtraggio dei progetti per tecnologie**:
  - Elenco dei progetti filtrato per le tecnologie associate.

## Tecnologie Utilizzate

- **Laravel 10**: Framework PHP per la gestione del backend.
- **Eloquent ORM**: Per la gestione delle relazioni tra modelli.
- **API RESTful**: Interfaccia per l'interazione con i dati tramite HTTP.
- **JSON**: Formato di risposta delle API.
- **PHP**: Linguaggio di programmazione per il backend.
- **MySQL**: Database per la memorizzazione dei dati.
