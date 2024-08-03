<head>
    <!-- Otras inclusiones de CSS y JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    <style>
        .profile-header {
            background: #ff8c00;
            padding: 20px;
            border-bottom: 1px solid #e9ecef;
            color: white;
        }
        .profile-container {
            text-align: center;
        }
        .profile-container img {
            border-radius: 50%;
            height: 150px;
            width: 150px;
            border: 5px solid white;
        }
        .profile-details {
            margin-top: 20px;
        }
        .profile-details h1, .profile-details h3 {
            margin: 0;
        }
        .section-title {
            margin-top: 30px;
            border-bottom: 1px solid #ff8c00;
            padding-bottom: 10px;
            color: #ff8c00;
        }
        .contact-list, .interests-list, .languages-list {
            list-style: none;
            padding: 0;
        }
        .contact-list li, .interests-list li, .languages-list li {
            margin: 10px 0;
        }
        .contact-list li i, .interests-list li i, .languages-list li i {
            color: #ff8c00;
        }
        .breadcrumb-item a {
            color: #ff8c00;
        }
        .breadcrumb-item.active {
            color: #ff8c00;
        }
        .btn-primary {
            background-color: #ff8c00;
            border-color: #ff8c00;
        }
        .btn-primary:hover {
            background-color: #e87b00;
            border-color: #e87b00;
        }
        .progress-bar {
            background-color: #ff8c00;
        }
    </style>
</head>

{{ view('layouts.header') }}

<div class="content-wrapper mt-4">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    <h1 class="m-0">Perfil de Usuario</h1>
                </div>
                <div class="col-4 text-right">
                    <a href="{{ route('index') }}" class="btn btn-primary">
                        <i class="fa fa-home"></i> Home
                    </a>
                    <button onclick="printPDF()" class="btn btn-primary">
                        <i class="fa fa-print"></i> Imprimir PDF
                    </button>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><i class="fas fa-angle-right"></i></li>
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                        <li class="breadcrumb-item"><i class="fas fa-angle-right"></i></li>
                        <li class="breadcrumb-item">Perfiles de usuario</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-12">
                <div class="card mb-5">
                    <div class="profile-header">
                        <div class="profile-container">
                            <img src="{{ isset($information['personal_info']['image_path']) && !empty($information['personal_info']['image_path']) ? asset('assets/images/'. $information['personal_info']['image_path']) : asset('assets/images/user-thumb.jpg') }}" alt="Foto de Perfil" />
                            <div class="profile-details">
                                <h1>{{ $information['personal_info']['first_name'] ?? 'Nombre' }} {{ $information['personal_info']['last_name'] ?? 'Apellido' }}</h1>
                                <h3>{{ $information['personal_info']['profile_title'] ?? 'Título Profesional' }}</h3>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="contact-container">
                                        <h2 class="section-title">Contacto</h2>
                                        <ul class="contact-list">
                                            @if (!empty($information['contact_info']['email']))
                                                <li><i class="fa fa-envelope"></i> <a href="mailto:{{ $information['contact_info']['email'] }}">{{ $information['contact_info']['email'] }}</a></li>
                                            @endif
                                            @if (!empty($information['contact_info']['phone_number']))
                                                <li><i class="fa fa-phone"></i> <a href="tel:{{ $information['contact_info']['phone_number'] }}">{{ $information['contact_info']['phone_number'] }}</a></li>
                                            @endif
                                            @if (!empty($information['contact_info']['website']))
                                                <li><i class="fa fa-globe"></i> <a href="{{ $information['contact_info']['website'] }}" target="_blank">{{ $information['contact_info']['website'] }}</a></li>
                                            @endif
                                            @if (!empty($information['contact_info']['linkedin_link']))
                                                <li><i class="fab fa-linkedin"></i> <a href="{{ $information['contact_info']['linkedin_link'] }}" target="_blank">{{ $information['contact_info']['linkedin_link'] }}</a></li>
                                            @endif
                                            @if (!empty($information['contact_info']['github_link']))
                                                <li><i class="fab fa-github"></i> <a href="{{ $information['contact_info']['github_link'] }}" target="_blank">{{ $information['contact_info']['github_link'] }}</a></li>
                                            @endif
                                            @if (!empty($information['contact_info']['twitter']))
                                                <li><i class="fab fa-twitter"></i> <a href="{{ $information['contact_info']['twitter'] }}" target="_blank">{{ $information['contact_info']['twitter'] }}</a></li>
                                            @endif
                                        </ul>
                                    </div>

                                    @if (!empty($information['education_info']))
                                        <div class="education-container">
                                            <h2 class="section-title">Educación</h2>
                                            @foreach ($information['education_info'] as $education_info)
                                                <div class="item">
                                                    <h4>{{ $education_info['degree_title'] ?? '' }}</h4>
                                                    <h5>{{ $education_info['institute'] ?? '' }}</h5>
                                                    <div>{{ $education_info['edu_start_date'] ?? '' }} - {{ $education_info['edu_end_date'] ?? '' }}</div>
                                                    <p>{{ $education_info['education_description'] ?? '' }}</p>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif

                                    @if (!empty($information['language_info']))
                                        <div class="languages-container">
                                            <h2 class="section-title">Idiomas</h2>
                                            <ul class="languages-list">
                                                @foreach ($information['language_info'] as $language_info)
                                                    <li>{{ $language_info['language'] ?? '' }} ({{ $language_info['language_level'] ?? '' }})</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    @if (!empty($information['interest_info']))
                                        <div class="interests-container">
                                            <h2 class="section-title">Intereses</h2>
                                            <ul class="interests-list">
                                                @foreach ($information['interest_info'] as $interest_info)
                                                    <li>{{ $interest_info['interest'] ?? '' }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-8">
                                    @if (!empty($information['personal_info']['about_me']))
                                        <section class="section summary-section">
                                            <h2 class="section-title"><i class="fa fa-user"></i> Perfil Profesional</h2>
                                            <div class="summary">
                                                <p>{{ $information['personal_info']['about_me'] ?? 'Descripción no disponible' }}</p>
                                            </div>
                                        </section>
                                    @endif

                                    @if (!empty($information['experience_info']))
                                        <section class="section experiences-section">
                                            <h2 class="section-title"><i class="fa fa-briefcase"></i> Experiencia Laboral</h2>
                                            @foreach ($information['experience_info'] as $experience_info)
                                                <div class="item">
                                                    <div class="meta">
                                                        <h3>{{ $experience_info['job_title'] ?? '' }}</h3>
                                                        <div>{{ $experience_info['job_start_date'] ?? '' }} - {{ $experience_info['job_end_date'] ?? '' }}</div>
                                                        <div>{{ $experience_info['organization'] ?? '' }}</div>
                                                    </div>
                                                    <p>{{ $experience_info['job_description'] ?? '' }}</p>
                                                </div>
                                            @endforeach
                                        </section>
                                    @endif

                                    @if (!empty($information['skill_info']))
                                        <section class="skills-section section">
                                            <h2 class="section-title"><i class="fa fa-rocket"></i> Habilidades</h2>
                                            <div class="skillset">
                                                @foreach ($information['skill_info'] as $skill_info)
                                                    <div class="item">
                                                        <h3>{{ $skill_info['skill_name'] ?? '' }}</h3>
                                                        <div class="progress">
                                                            <div class="progress-bar" role="progressbar" style="width: {{ $skill_info['skill_percentage'] ?? 0 }}%;" aria-valuenow="{{ $skill_info['skill_percentage'] ?? 0 }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </section>
                                    @endif
                                </div>
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

<script>
function printPDF() {
    var element = document.querySelector('.content-wrapper');
    
    html2canvas(element, {
        onrendered: function (canvas) {
            var imgData = canvas.toDataURL('image/png');
            var doc = new jsPDF('p', 'mm', 'letter');
            var imgWidth = 215.9; 
            var pageHeight = 279.4; 
            var imgHeight = canvas.height * imgWidth / canvas.width;
            var heightLeft = imgHeight;
            var position = 0;

            doc.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
            heightLeft -= pageHeight;

            while (heightLeft >= 0) {
                position = heightLeft - imgHeight;
                doc.addPage();
                doc.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
                heightLeft -= pageHeight;
            }
            doc.save('Curriculum.pdf');
        }
    });
}
</script>

{{ view('layouts.footer') }}
