<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nuevo Paciente</title>
    <link rel="stylesheet" href="<?= base_url('public/modulopacientecss/nuevopaciente.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;600&display=swap" rel="stylesheet" />
</head>

<body>
    <!-- Sidebar -->
    <nav class="sidebar">
        <div>
            <div class="user-profile-sidebar">
                <div class="user-avatar">
                    <i class="fas fa-user"></i>
                </div>
                <div class="user-info">
                    <h3>Dra. Vivi Zurita</h3>
                    <p>Médico General</p>
                </div>
            </div>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="<?= base_url('/bienvenida'); ?>" class="nav-link">
                        <i class="fas fa-home"></i>
                        <span>Inicio</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('/buscarpaciente'); ?>" class="nav-link">
                        <i class="fas fa-hospital-user"></i>
                        <span>Pacientes</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('/buscadorhc'); ?>" class="nav-link active">
                        <i class="fas fa-file-medical"></i>
                        <span>Historias Clínicas</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="nav-logout">
            <a href="<?= base_url('/inicio'); ?>" class="nav-link">
                <i class="fas fa-sign-out-alt"></i>
                <span>Salir</span>
            </a>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="main-content">
        <div class="form-container">
            <h1 class="form-title">Registro de Nuevo Paciente</h1>
            <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
            <?php elseif (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>
            <form action="<?= base_url('nuevopaciente/store') ?>" method="POST">

                <div class="form-section">
                    <h2 class="section-title">Información Administrativa</h2>
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">Número de Historia Clínica</label>
                            <input type="text" name="numero_historia_clinica" class="form-input"
                                value="<?= isset($numero_historia_clinica) ? esc($numero_historia_clinica) : '' ?>"
                                readonly />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Fecha de Creación</label>
                            <input type="date" name="fecha_creacion" class="form-input" value="<?= date('Y-m-d') ?>"
                                required />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Institución</label>
                            <input type="text" name="institucion" class="form-input" required />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nombre Médico Responsable</label>
                            <input type="text" name="medico_responsable" class="form-input" required />
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h2 class="section-title">Datos Personales</h2>
                    <div class="form-grid">
                        <!-- Existing personal data fields -->
                        <div class="form-group">
                            <label class="form-label">Apellidos</label>
                            <input type="text" name="apellidos" class="form-input" required />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nombres</label>
                            <input type="text" name="nombres" class="form-input" required />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Fecha de Nacimiento</label>
                            <input type="date" name="fecha_nacimiento" class="form-input" required />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Edad</label>
                            <input type="number" name="edad" class="form-input" readonly />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Género</label>
                            <select name="genero" class="form-input" required>
                                <option value="">Seleccionar</option>
                                <option value="masculino">Masculino</option>
                                <option value="femenino">Femenino</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Cédula</label>
                            <input type="text" name="cedula" class="form-input" required />
                        </div>

                        <!-- New Document Upload Button -->
                        <div class="form-group document-upload-group">
                            <label class="form-label">Documentos de Identificación</label>
                            <button type="button" class="document-upload-button">
                                <i class="fas fa-upload"></i> Cargar Documentos
                            </button>
                            <input type="file" id="document-upload" class="document-upload-input" multiple
                                accept=".pdf,.jpg,.png" />
                        </div>

                        <!-- Rest of the existing personal data fields -->
                        <div class="form-group">
                            <label class="form-label">Nivel de Instrucción</label>
                            <select name="nivel_instruccion" class="form-input" required>
                                <option value="">Seleccionar</option>
                                <option value="primaria">Primaria</option>
                                <option value="secundaria">Secundaria</option>
                                <option value="superior">Superior</option>
                                <option value="postgrado">Postgrado</option>
                                <option value="otro">Otro</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Ocupación</label>
                            <input type="text" name="ocupacion" class="form-input" />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Estado Civil</label>
                            <select name="estado_civil" class="form-input" required>
                                <option value="">Seleccionar</option>
                                <option value="soltero">Soltero/a</option>
                                <option value="casado">Casado/a</option>
                                <option value="divorciado">Divorciado/a</option>
                                <option value="viudo">Viudo/a</option>
                                <option value="union-libre">Unión Libre</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Teléfono</label>
                            <input type="tel" name="telefono" class="form-input" required />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email</label>
                            <input type="email" name="correo_electronico" class="form-input" required />
                        </div>
                        <div class="form-group full-width">
                            <label class="form-label">Dirección</label>
                            <textarea class="form-input" name="direccion" required></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h2 class="section-title">Datos Médicos</h2>
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">Peso Actual (kg)</label>
                            <input type="number" name="peso_actual" step="0.1" class="form-input" required />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Talla (cm)</label>
                            <input type="number" name="talla" step="0.1" class="form-input" required />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Índice de Masa Corporal</label>
                            <input type="number" name="indice_masa_corporal" class="form-input" readonly />
                        </div>

                        <div class="form-group full-width">
                            <label class="form-label">Antecedentes Alérgicos</label>
                            <textarea class="form-input" name="antecedentes_alergicos"></textarea>
                        </div>
                        <div class="form-group full-width">
                            <label class="form-label">Cirugías Previas</label>
                            <textarea class="form-input" name="cirugias_previas"></textarea>
                        </div>
                        <div class="form-group full-width">
                            <label class="form-label">Antecedentes Personales</label>
                            <textarea class="form-input" name="antecedentes_personales"></textarea>
                        </div>
                        <div class="form-group full-width">
                            <label class="form-label">Antecedentes Familiares</label>
                            <textarea class="form-input" name="antecedentes_familiares"></textarea>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h2 class="section-title">Contacto de Emergencia</h2>
                    <div class="form-grid">
                        <div class="form-group">
                            <label class="form-label">Nombre Completo</label>
                            <input type="text" name="nombre_completo" class="form-input" required />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Relación</label>
                            <input type="text" name="relacion" class="form-input" required />
                        </div>
                        <div class="form-group">
                            <label class="form-label">Teléfono</label>
                            <input type="tel" name="numero_telefono" class="form-input" required />
                        </div>
                    </div>
                </div>

                <div class="button-container">
                    <button type="submit" class="form-button">Guardar Paciente</button>
                </div>
            </form>
        </div>
    </div>
    <script>
    // Optional JavaScript to handle file upload interaction
    document.addEventListener("DOMContentLoaded", () => {
        const uploadButton = document.querySelector(".document-upload-button");
        const fileInput = document.getElementById("document-upload");

        uploadButton.addEventListener("click", () => {
            fileInput.click();
        });

        fileInput.addEventListener("change", (event) => {
            const files = event.target.files;
            if (files.length > 0) {
                uploadButton.innerHTML =
                    `<i class="fas fa-check"></i> ${files.length} archivo(s) seleccionado(s)`;
            }
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        const fechaNacimientoInput = document.querySelector('input[name="fecha_nacimiento"]');
        const edadInput = document.querySelector('input[name="edad"]');

        fechaNacimientoInput.addEventListener('change', function() {
            const fechaNacimiento = new Date(this.value);
            const hoy = new Date();
            let edad = hoy.getFullYear() - fechaNacimiento.getFullYear();
            const mes = hoy.getMonth() - fechaNacimiento.getMonth();
            if (mes < 0 || (mes === 0 && hoy.getDate() < fechaNacimiento.getDate())) {
                edad--;
            }
            edadInput.value = edad;
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        const pesoInput = document.querySelector('input[name="peso_actual"]');
        const tallaInput = document.querySelector('input[name="talla"]');
        const imcInput = document.querySelector('input[name="indice_masa_corporal"]');

        function calcularIMC() {
            const peso = parseFloat(pesoInput.value);
            const talla = parseFloat(tallaInput.value) / 100; // Convertir cm a m
            if (!isNaN(peso) && !isNaN(talla) && talla > 0) {
                const imc = (peso / (talla * talla)).toFixed(1);
                imcInput.value = imc;
            } else {
                imcInput.value = '';
            }
        }

        pesoInput.addEventListener('input', calcularIMC);
        tallaInput.addEventListener('input', calcularIMC);
    });
    </script>
</body>

</html>