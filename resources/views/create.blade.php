{{ view('layouts.header') }}

<div class="content-wrapper mt-4">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    <h1 class="m-0">Manejo de Perfiles </h1>
                </div>
                <div class="col-4 text-right">
                    <a href="{{ route('index') }}" class="add-btn">
                        <i class="fa fa-home"></i>
                        <br> Home
                    </a>
                    <button onclick="saverecord()" class="save-btn">
                        <i class="fa fa-save"></i>
                        <br> Guardar 
                    </button>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ul class="page-breadcrumb breadcrumb">
                        <li class="breadcrumb-item"><i class="fas fa-angle-right"></i></li>
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                        <li class="breadcrumb-item"><i class="fas fa-angle-right"></i></li>
                        <li class="breadcrumb-item">Crear un Perfil </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-12">
                <div class="card mb-5">
                    <div class="card-header">
                        <h3 class="card-title">Crear Perfil de usuario</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 p-md-5 p-sm-4 p-3">
                                <form action="{{ route('store') }}" id="createform" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    {{-- Personal Information --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <h2 class="fw-bold text-secondary">Información Personal </h2>
                                            <div class="form-outline mb-4">
                                                <input type="hidden" id="user_id" name="user_id"
                                                    class="form-control" />
                                            </div>
                                            <div class="row mb-4">
                                                <div class="col-sm-6 col-12">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="form-outline mb-4">
                                                                <label class="form-label fw-bold text-secondary">Nombre(s) </label>
                                                                <input type="text" id="first_name" name="first_name"
                                                                    placeholder="Nombre(s)" class="form-control"
                                                                    required />
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-outline">
                                                                <label class="form-label fw-bold text-secondary">Apellidos </label>
                                                                <input type="text" id="last_name" name="last_name"
                                                                    placeholder="Apellidos " class="form-control" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-12">
                                                    <div class="profile_picture text-center">
                                                        <input type="file" name="image_path"
                                                            accept="image/png, image/jpeg, image/jpg"
                                                            onchange="display_image(this);"
                                                            class="d-none upload-box-image">
                                                        <img class="box-image-preview img-fluid img-circle elevation-2"
                                                            src="{{ asset('assets/images/user-thumb.jpg') }}"
                                                            alt="Profile picture"
                                                            onclick="$(this).closest('.profile_picture').find('input').click();"
                                                            style="height:150px; width:150px;">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-outline mb-4">
                                                <label class="form-label fw-bold text-secondary">Título </label>
                                                <input type="text" id="profile_title" name="profile_title"
                                                    class="form-control" placeholder="Titulo" required />
                                            </div>
                                            <div class="form-outline mb-4">
                                                <label class="form-label fw-bold text-secondary">Descripcion </label>
                                                <textarea class="form-control" placeholder="Descripcion" id="about_me" name="about_me" rows="4"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Contact Information --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <h2 class="fw-bold text-secondary">Información de contacto </h2>
                                            <div class="row mb-4">
                                                <div class="col-md-4 col-sm-6 col-12 mb-4">
                                                    <div class="form-outline">
                                                        <label class="form-label fw-bold text-secondary">Email</label>
                                                        <input type="email" id="email" name="email"
                                                            placeholder="Email" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-6 col-12 mb-4">
                                                    <div class="form-outline">
                                                        <label class="form-label fw-bold text-secondary">Número telefónico</label>
                                                        <input type="number" id="phone_number" name="phone_number"
                                                            placeholder="Numero telefónico" class="form-control" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-6 col-12 mb-4">
                                                    <div class="form-outline">
                                                        <label
                                                            class="form-label fw-bold text-secondary">Sitio web  </label>
                                                        <input type="url" id="website" name="website"
                                                            class="form-control" placeholder="Sitio web personal " />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-6 col-12 mb-4">
                                                    <div class="form-outline">
                                                        <label
                                                            class="form-label fw-bold text-secondary">LinkedIn</label>
                                                        <input type="url" id="linkedin_link" name="linkedin_link"
                                                            class="form-control" placeholder="LinkedIn" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-6 col-12 mb-4">
                                                    <div class="form-outline">
                                                        <label class="form-label fw-bold text-secondary">Github</label>
                                                        <input type="url" id="github_link" name="github_link"
                                                            class="form-control" placeholder="Github" />
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-sm-6 col-12 mb-4">
                                                    <div class="form-outline">
                                                        <label
                                                            class="form-label fw-bold text-secondary">Twitter</label>
                                                        <input type="text" id="twitter" name="twitter"
                                                            class="form-control" placeholder="Twitter" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Education --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-8">
                                                    <h2 class="fw-bold text-secondary">Educacion</h2>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <button class="btn btn-primary" id="add_education">Agregar información </button>
                                                </div>
                                            </div>
                                            <section class="education_section">
                                                <div class="card mb-4">
                                                    <div class="card-body">
                                                        <div class="form-outline mb-4">
                                                            <label
                                                                class="form-label fw-bold text-secondary">Grado </label>
                                                            <input type="text" id="degree_title"
                                                                name="degree_title[]" class="form-control"
                                                                placeholder="Grado " />
                                                        </div>
                                                        <div class="form-outline mb-4">
                                                            <label
                                                                class="form-label fw-bold text-secondary">Instituto/Universidad </label>
                                                            <input type="text" id="institute" name="institute[]"
                                                                class="form-control" placeholder="Instituto" />
                                                        </div>
                                                        <div class="row mb-4">
                                                            <div class="col-sm-6 col-12">
                                                                <div class="form-outline">
                                                                    <label
                                                                        class="form-label fw-bold text-secondary">Fecha Inicio</label>
                                                                    <input type="date" id="edu_start_date"
                                                                        name="edu_start_date[]"
                                                                        class="form-control" />
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-12">
                                                                <div class="form-outline">
                                                                    <label
                                                                        class="form-label fw-bold text-secondary">Finalización </label>
                                                                    <input type="date" id="edu_end_date"
                                                                        name="edu_end_date[]" class="form-control" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-outline mb-4">
                                                            <label class="form-label fw-bold text-secondary">Descripción del grado </label>
                                                            <textarea class="form-control" placeholder="Descripcion" id="education_description" name="education_description[]"
                                                                rows="4"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>

                                    {{-- Experiencce --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-8">
                                                    <h2 class="fw-bold text-secondary">Experiencia laboral </h2>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <button class="btn btn-primary" id="add_experience">Agregar Información </button>
                                                </div>
                                            </div>
                                            <section class="experience_section">
                                                <div class="card mb-4">
                                                    <div class="card-body">
                                                        <div class="form-outline mb-4">
                                                            <label class="form-label fw-bold text-secondary">Título del trabajo </label>
                                                            <input type="text" id="job_title" name="job_title[]"
                                                                class="form-control" placeholder="Titulo del trabajo " />
                                                        </div>
                                                        <div class="form-outline mb-4">
                                                            <label
                                                                class="form-label fw-bold text-secondary">Empresa </label>
                                                            <input type="text" id="organization"
                                                                name="organization[]" class="form-control"
                                                                placeholder="Empresa " />
                                                        </div>
                                                        <div class="row mb-4">
                                                            <div class="col-sm-6 col-12">
                                                                <div class="form-outline">
                                                                    <label
                                                                        class="form-label fw-bold text-secondary">Fecha de inicio </label>
                                                                    <input type="date" id="job_start_date"
                                                                        name="job_start_date[]"
                                                                        class="form-control" />
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6 col-12">
                                                                <div class="form-outline">
                                                                    <label
                                                                        class="form-label fw-bold text-secondary">Fecha de finalización </label>
                                                                    <input type="date" id="job_end_date"
                                                                        name="job_end_date[]" class="form-control" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-outline mb-4">
                                                            <label class="form-label fw-bold text-secondary">Descripción del trabajo </label>
                                                            <textarea class="form-control" placeholder="Descripcion " id="job_description" name="job_description[]"
                                                                rows="4"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>

                                    {{-- Projects --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-8">
                                                    <h2 class="fw-bold text-secondary">Proyectos</h2>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <button class="btn btn-primary" id="add_project">Agregar información </button>
                                                </div>
                                            </div>
                                            <section class="project_section">
                                                <div class="card mb-4">
                                                    <div class="card-body">
                                                        <div class="form-outline mb-4">
                                                            <label class="form-label fw-bold text-secondary"> Nombre del proyecto </label>
                                                            <input type="text" id="project_title"
                                                                name="project_title[]" class="form-control"
                                                                placeholder=" Nombre del proyecto " />
                                                        </div>
                                                        <div class="form-outline mb-4">
                                                            <label class="form-label fw-bold text-secondary">Descripcion </label>
                                                            <textarea class="form-control" placeholder=" Descripcion" id="project_description"
                                                                name="project_description[]" rows="4"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>

                                    {{-- SKILLS & PROFICIENCY --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-8">
                                                    <h2 class="fw-bold text-secondary">Habilidades </h2>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <button class="btn btn-primary" id="add_skill">Agregar informacion </button>
                                                </div>
                                            </div>
                                            <section class="skill_section">
                                                <div class="card mb-4">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-10">
                                                                <div class="form-outline">
                                                                    <label
                                                                        class="form-label fw-bold text-secondary">Agregar haabilidad </label>
                                                                    <input type="text" id="skill_name"
                                                                        name="skill_name[]" class="form-control"
                                                                        placeholder="Agregar habilidad " value="" />
                                                                </div>
                                                            </div>
                                                            <div class="col-2">
                                                                <div class="form-outline">
                                                                    <label
                                                                        class="form-label fw-bold text-secondary">Porcentaje</label>
                                                                    <div class="input-group">
                                                                        <input type="number" step="5"
                                                                            id="skill_percentage"
                                                                            name="skill_percentage[]" placeholder="%"
                                                                            class="form-control"
                                                                            aria-describedby="percentage">
                                                                        <span class="input-group-text"
                                                                            id="percentage">%</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>

                                    {{-- Languages --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-8">
                                                    <h2 class="fw-bold text-secondary">Idiomas</h2>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <button class="btn btn-primary" id="add_language">Agregar informacion </button>
                                                </div>
                                            </div>
                                            <section class="language_section">
                                                <div class="card mb-4">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-10">
                                                                <div class="form-outline">
                                                                    <label
                                                                        class="form-label fw-bold text-secondary">Agregar informacion </label>
                                                                    <select class="form-control" id="language"
                                                                        name="language[]">
                                                                        <option value="">Elija un idioma </option>
                                                                        <option value="af">Afrikaans</option>
                                                                        <option value="sq">Albanian - shqip
                                                                        </option>
                                                                        <option value="am">Amharic - አማርኛ</option>
                                                                        <option value="ar">Arabic - العربية
                                                                        </option>
                                                                        <option value="an">Aragonese - aragonés
                                                                        </option>
                                                                        <option value="hy">Armenian - հայերեն
                                                                        </option>
                                                                        <option value="ast">Asturian - asturianu
                                                                        </option>
                                                                    
                                                                   
                                                                        <option value="be">Belarusian - беларуская
                                                                        </option>
                                                                        <option value="bn">Bengali - বাংলা</option>
                                                                        <option value="bs">Bosnian - bosanski
                                                                        </option>
                                                                        <option value="br">Breton - brezhoneg
                                                                        </option>
                                                                        <option value="bg">Bulgarian - български
                                                                        </option>
                                                                        <option value="ca">Catalan - català
                                                                        </option>
                                                                        <option value="ckb">Central Kurdish - کوردی
                                                                            (دەستنوسی
                                                                            عەرەبی)</option>
                                                                        <option value="zh">Chinese - 中文</option>
                                                                        <option value="zh-HK">Chinese (Hong Kong) -
                                                                            中文（香港）
                                                                        </option>
                                                                        <option value="zh-CN">Chinese (Simplified) -
                                                                            中文（简体）
                                                                        </option>
                                                                        <option value="zh-TW">Chinese (Traditional) -
                                                                            中文（繁體）
                                                                        </option>
                                                                       
                                                                        <option value="hr">Croatian - hrvatski
                                                                        </option>
                                                                        <option value="cs">Czech - čeština</option>
                                                                        <option value="da">Danish - dansk</option>
                                                                        <option value="nl">Dutch - Nederlands
                                                                        </option>
                                                                        <option value="en">English</option>
                                                                        <option value="en-AU">English (Australia)
                                                                        </option>
                                                                        <option value="en-CA">English (Canada)
                                                                        </option>
                                                                        <option value="en-IN">English (India)</option>
                                                                        <option value="en-NZ">English (New Zealand)
                                                                        </option>
                                                                        <option value="en-ZA">English (South Africa)
                                                                        </option>
                                                                        <option value="en-GB">English (United Kingdom)
                                                                        </option>
                                                                        <option value="en-US">English (United States)
                                                                        </option>
                                                                        <option value="eo">Esperanto - esperanto
                                                                        </option>
                                                                        <option value="et">Estonian - eesti
                                                                        </option>
                                                                        <option value="fo">Faroese - føroyskt
                                                                        </option>
                                                                        <option value="fil">Filipino</option>
                                                                        <option value="fi">Finnish - suomi</option>
                                                                        <option value="fr">French - français
                                                                        </option>
                                                                        <option value="fr-CA">French (Canada) -
                                                                            français (Canada)
                                                                        </option>
                                                                        <option value="fr-FR">French (France) -
                                                                            français (France)
                                                                        </option>
                                                                        <option value="fr-CH">French (Switzerland) -
                                                                            français
                                                                            (Suisse)</option>
                                                                        <option value="gl">Galician - galego
                                                                        </option>
                                                                        <option value="ka">Georgian - ქართული
                                                                        </option>
                                                                        <option value="de">German - Deutsch
                                                                        </option>
                                                                        <option value="de-AT">German (Austria) -
                                                                            Deutsch
                                                                            (Österreich)</option>
                                                                        <option value="de-DE">German (Germany) -
                                                                            Deutsch
                                                                            (Deutschland)</option>
                                                                        <option value="de-LI">German (Liechtenstein) -
                                                                            Deutsch
                                                                            (Liechtenstein)
                                                                        </option>
                                                                        <option value="de-CH">German (Switzerland) -
                                                                            Deutsch
                                                                            (Schweiz)</option>
                                                                        <option value="el">Greek - Ελληνικά
                                                                        </option>
                                                                        <option value="gn">Guarani</option>
                                                                    
                                                                        <option value="haw">Hawaiian - ʻŌlelo
                                                                            Hawaiʻi</option>
                                                                        <option value="he">Hebrew - עברית</option>
                                                                        <option value="hi">Hindi - हिन्दी</option>
                                                                        <option value="hu">Hungarian - magyar
                                                                        </option>
                                                                        <option value="is">Icelandic - íslenska
                                                                        </option>
                                                                        <option value="id">Indonesian - Indonesia
                                                                        </option>
                                                                        <option value="ia">Interlingua</option>
                                                                        <option value="ga">Irish - Gaeilge</option>
                                                                        <option value="it">Italian - italiano
                                                                        </option>
                                                                        <option value="it-IT">Italian (Italy) -
                                                                            italiano (Italia)
                                                                        </option>
                                                                        <option value="it-CH">Italian (Switzerland) -
                                                                            italiano
                                                                            (Svizzera)</option>
                                                                        <option value="ja">Japanese - 日本語</option>
                                                                       
                                                                        <option value="ko">Korean - 한국어</option>
                                                                        <option value="ku">Kurdish - Kurdî</option>
                                                                        <option value="ky">Kyrgyz - кыргызча
                                                                        </option>
                                                                    
                                                                        <option value="la">Latin</option>
                                                                        <option value="lv">Latvian - latviešu
                                                                        </option>
                                                                        <option value="ln">Lingala - lingála
                                                                        </option>
                                                                        <option value="lt">Lithuanian - lietuvių
                                                                        </option>
                                                                        <option value="mk">Macedonian - македонски
                                                                        </option>
                                                                        <option value="ms">Malay - Bahasa Melayu
                                                                        </option>
                                                                        <option value="ml">Malayalam - മലയാളം
                                                                        </option>
                                                                        <option value="mt">Maltese - Malti</option>
                                                                        <option value="mr">Marathi - मराठी</option>
                                                                        <option value="mn">Mongolian - монгол
                                                                        </option>
                                                                        <option value="ne">Nepali - नेपाली</option>
                                                                        <option value="no">Norwegian - norsk
                                                                        </option>
                                                                        <option value="nb">Norwegian Bokmål - norsk
                                                                            bokmål
                                                                        </option>
                                                                        <option value="nn">Norwegian Nynorsk -
                                                                            nynorsk</option>
                                                                        <option value="oc">Occitan</option>
                                                                        <option value="or">Oriya - ଓଡ଼ିଆ</option>
                                                                        <option value="om">Oromo - Oromoo</option>
                                                                        <option value="ps">Pashto - پښتو</option>
                                                                        <option value="fa">Persian - فارسی</option>
                                                                        <option value="pl">Polish - polski</option>
                                                                        <option value="pt">Portuguese - português
                                                                        </option>
                                                                        <option value="pt-BR">Portuguese (Brazil) -
                                                                            português
                                                                            (Brasil)</option>
                                                                        <option value="pt-PT">Portuguese (Portugal) -
                                                                            português
                                                                            (Portugal)
                                                                        </option>
                                                                    
                                                                        <option value="mo">Romanian (Moldova) -
                                                                            română
                                                                            (Moldova)</option>
                                                                        <option value="rm">Romansh - rumantsch
                                                                        </option>
                                                                        <option value="ru">Russian - русский
                                                                        </option>
                                                                        <option value="gd">Scottish Gaelic</option>
                                                                   
                                                                        </option>
                                                                        <option value="sn">Shona - chiShona
                                                                        </option>
                                                                       
                                                                        <option value="es">Spanish - español
                                                                        </option>
                                                                        <option value="es-AR">Spanish (Argentina) -
                                                                            español
                                                                            (Argentina)</option>
                                                                        <option value="es-419">Spanish (Latin America)
                                                                            - español
                                                                            (Latinoamérica)
                                                                        </option>
                                                                        <option value="es-MX">Spanish (Mexico) -
                                                                            español (México)
                                                                        </option>
                                                                        <option value="es-ES">Spanish (Spain) -
                                                                            español (España)
                                                                        </option>
                                                                        <option value="es-US">Spanish (United States)
                                                                            - español
                                                                            (Estados Unidos)
                                                                        </option>
                                                                        <option value="su">Sundanese</option>
                                                                        <option value="sw">Swahili - Kiswahili
                                                                        </option>
                                                                        <option value="sv">Swedish - svenska
                                                                        </option>
                                                                       
                                                                        <option value="tr">Turkish - Türkçe
                                                                        </option>
                                                                        <option value="tk">Turkmen</option>
                                                                        <option value="tw">Twi</option>
                                                                        <option value="uk">Ukrainian - українська
                                                                        </option>
                                                        
                                                                        
                                                                        <option value="zu">Zulu - isiZulu</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-2">
                                                                <div class="form-outline">
                                                                    <label
                                                                        class="form-label fw-bold text-secondary">Nivel </label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-text"
                                                                            id="percentage">Nivel </span>
                                                                        <select id="language_level"
                                                                            name="language_level[]"
                                                                            placeholder="level" class="form-control"
                                                                            aria-describedby="percentage">
                                                                            <option value="">Seleccione 
                                                                            </option>
                                                                            <option value="Native">Nativo</option>
                                                                            <option value="Fluent">Fluido </option>
                                                                            <option value="Basic">Basico</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>

                                    {{-- Interests --}}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-8">
                                                    <h2 class="fw-bold text-secondary">Intereses</h2>
                                                </div>
                                                <div class="col-4 text-end">
                                                    <button class="btn btn-primary" id="add_interest">Agregar intereses </button>
                                                </div>
                                            </div>
                                            <section class="interest_section">
                                                <div class="card mb-4">
                                                    <div class="card-body">
                                                        <div class="form-outline">
                                                            <label class="form-label fw-bold text-secondary">Agregar intereses </label>
                                                            <input type="text" id="interest" name="interest[]"
                                                                class="form-control" placeholder=" interes " />
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>


                                    <!-- Checkbox -->
                                    <div class="form-check d-flex justify-content-center mb-4">
                                        <input class="form-check-input me-2" type="checkbox" value="1"
                                            id="verify" name="verify" required />
                                        <label for="verify" class="form-check-label text-dark"> ¿Está seguro de crear su CV? 
                                        </label>
                                    </div>

                                    <!-- Submit button -->
                                    <button type="submit" id="submitbtn" class="btn btn-lg btn-primary w-100">Crear CV </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
</div>

{{ view('layouts.footer') }}
