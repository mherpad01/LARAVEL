@extends('app.bootstrap.template')

@section('content')
<div class="container py-5">

    <div class="row align-items-center g-5">

        <div class="col-md-6 text-center">
            <img 
                src="{{ url('assets/img/ieszaidinvergeles.jpg') }}" 
                alt="Sobre el Centro" 
                class="img-fluid rounded shadow-lg"
                style="max-height: 400px; object-fit: cover;"
            >
        </div>

        <div class="col-md-6">
            <h2 class="fw-bold mb-4 text-uppercase">Sobre Nosotros</h2>
            <p class="lead mb-4">
                Bienvenido a <strong>Academia Formativa</strong>, donde ayudamos a nuestros alumnos a desarrollar su potencial 
                tanto académico como profesional. Nuestro compromiso es brindar una educación moderna, práctica y enfocada en el crecimiento personal.
            </p>
            <p>
                Creemos en la excelencia, la innovación y el aprendizaje continuo. Cada alumno forma parte de una comunidad educativa 
                que promueve el desarrollo de habilidades y el éxito en el mundo laboral.
            </p>
            <a href="{{ url('/') }}" class="btn btn-outline-dark mt-3 rounded-pill px-4 shadow-sm">
                Volver al Inicio
            </a>
        </div>

    </div>
</div>
@endsection
