<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currículum Vitae</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .profile-header {
            text-align: center;
            margin-bottom: 40px;
            background-color: #1b6da9;
            color: white;
            padding: 20px 0;
        }
        .profile-header img {
            border-radius: 50%;
            height: 150px;
            width: 150px;
        }
        .profile-header h1 {
            margin-top: 20px;
            font-size: 2em;
        }
        .profile-header h3 {
            font-size: 1.8em;
            color: 	#FFA500 ;
        }
        .section-title {
            border-bottom: 4px solid #4682B4;
            margin-bottom: 10px;
            padding-bottom: 10px;
            font-size: 1.7em;
        }
        .section-content {
            margin-bottom: 70px;
        }
        .contact-info ul {
            list-style: none;
            padding: 0;
        }
        .contact-info ul li {
            margin-bottom: 10px;
        }
        .progress-bar {
            background-color: #87CEEB;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="profile-header">
            <img src="{{ isset($information['personal_info']['image_path']) && !empty($information['personal_info']['image_path']) ? asset('assets/images/'. $information['personal_info']['image_path'])  : asset('assets/images/user-thumb.jpg') }}" alt="Profile Picture">
            <h1>{{ isset($information['personal_info']['first_name']) ? $information['personal_info']['first_name'] : 'Nombre' }} {{ isset($information['personal_info']['last_name']) ? $information['personal_info']['last_name'] : 'Apellido' }}</h1>
            <h3>{{ isset($information['personal_info']['profile_title']) ? $information['personal_info']['profile_title'] : 'Título Profesional' }}</h3>
        </div>

        <div class="text-right mb-4">
            <button onclick="printPDF()" class="btn btn-primary">
                <i class="fa fa-print"></i> Imprimir PDF
            </button>
            <a href="{{ route('index') }}" class="btn btn-primary">
                        <i class="fa fa-home"></i> Home
                    </a>
        </div>
        
        <section class="section-content">
            <h2 class="section-title">Perfil de carrera</h2>
            <p>{{ isset($information['personal_info']['about_me']) ? $information['personal_info']['about_me'] : 'Descripción del perfil profesional.' }}</p>
        </section>

        <section class="section-content">
            <h2 class="section-title">Experiencia</h2>
            @if (!empty($information['experience_info']))
                @foreach ($information['experience_info'] as $experience_info)
                    <div class="mb-4">
                        <h4>{{ isset($experience_info['job_title']) ? $experience_info['job_title'] : '' }}</h4>
                        <h5>{{ isset($experience_info['organization']) ? $experience_info['organization'] : '' }}</h5>
                        <p>{{ isset($experience_info['job_start_date']) ? $experience_info['job_start_date'] : '' }} - {{ isset($experience_info['job_end_date']) ? $experience_info['job_end_date'] : '' }}</p>
                        <p>{{ isset($experience_info['job_description']) ? $experience_info['job_description'] : '' }}</p>
                    </div>
                @endforeach
            @endif
        </section>

        <section class="section-content">
            <h2 class="section-title">Educación</h2>
            @if (!empty($information['education_info']))
                @foreach ($information['education_info'] as $education_info)
                    <div class="mb-4">
                        <h4>{{ isset($education_info['degree_title']) ? $education_info['degree_title'] : '' }}</h4>
                        <h5>{{ isset($education_info['institute']) ? $education_info['institute'] : '' }}</h5>
                        <p>{{ isset($education_info['edu_start_date']) ? $education_info['edu_start_date'] : '' }} - {{ isset($education_info['edu_end_date']) ? $education_info['edu_end_date'] : '' }}</p>
                        <p>{{ isset($education_info['education_description']) ? $education_info['education_description'] : '' }}</p>
                    </div>
                @endforeach
            @endif
        </section>

        <section class="section-content">
            <h2 class="section-title">Habilidades</h2>
            @if (!empty($information['skill_info']))
                <ul class="list-group">
                    @foreach ($information['skill_info'] as $skill_info)
                        <li class="list-group-item">
                            <h4>{{ isset($skill_info['skill_name']) ? $skill_info['skill_name'] : '' }}</h4>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: {{ isset($skill_info['skill_percentage']) ? $skill_info['skill_percentage'] : '0' }}%;" aria-valuenow="{{ isset($skill_info['skill_percentage']) ? $skill_info['skill_percentage'] : '0' }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </section>

        <section class="section-content">
            <h2 class="section-title">Proyectos</h2>
            @if (!empty($information['project_info']))
                @foreach ($information['project_info'] as $project_info)
                    <div class="mb-4">
                        <h4>{{ isset($project_info['project_title']) ? $project_info['project_title'] : '' }}</h4>
                        <p>{{ isset($project_info['project_description']) ? $project_info['project_description'] : '' }}</p>
                    </div>
                @endforeach
            @endif
        </section>

        <section class="section-content">
            <h2 class="section-title">Contacto</h2>
            <div class="contact-info">
                <ul>
                    @if (!empty($information['contact_info']['email']))
                        <li>Email: <a href="mailto:{{ $information['contact_info']['email'] }}">{{ $information['contact_info']['email'] }}</a></li>
                    @endif
                    @if (!empty($information['contact_info']['phone_number']))
                        <li>Teléfono: <a href="tel:{{ $information['contact_info']['phone_number'] }}">{{ $information['contact_info']['phone_number'] }}</a></li>
                    @endif
                    @if (!empty($information['contact_info']['website']))
                        <li>Website: <a href="{{ $information['contact_info']['website'] }}" target="_blank">{{ $information['contact_info']['website'] }}</a></li>
                    @endif
                    @if (!empty($information['contact_info']['linkedin_link']))
                        <li>LinkedIn: <a href="{{ $information['contact_info']['linkedin_link'] }}" target="_blank">{{ $information['contact_info']['linkedin_link'] }}</a></li>
                    @endif
                    @if (!empty($information['contact_info']['github_link']))
                        <li>GitHub: <a href="{{ $information['contact_info']['github_link'] }}" target="_blank">{{ $information['contact_info']['github_link'] }}</a></li>
                    @endif
                    @if (!empty($information['contact_info']['twitter']))
                        <li>Twitter: <a href="{{ $information['contact_info']['twitter'] }}" target="_blank">{{ $information['contact_info']['twitter'] }}</a></li>
                    @endif
                </ul>
            </div>
        </section>
    </div>

    <script>
        function printPDF() {
            var element = document.querySelector('.container');
            
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
                    doc.save('Curriculumv3.pdf');
                }
            });
        }
    </script>
</body>
</html>
