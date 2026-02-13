# Verificación de Accesibilidad WCAG - Kairos

**Alumno/a:** Baltany  
**Fecha:** Febrero 2026  
**Herramientas utilizadas:** Comprobaciones manuales, revisión de código, Chrome DevTools

---

## 1. Percepción (Perceptible)

### 1.1.1 Contenido no textual (Nivel A)

| Criterio | Recomendación | index.php | detalles.php | login.php | register.php | soporte.php | plataformas.php |
|---|---|---|---|---|---|---|---|
| Todas las imágenes tienen texto alternativo | `alt` en todas las `<img>` | ✅ Correcto. Logo, portadas de producto con alt descriptivo | ✅ Correcto. Cover del producto con alt del título | ✅ Correcto. Logo con alt | ✅ Correcto. Logo con alt | ✅ Sin imágenes en contenido | ✅ Correcto. Logos de plataformas con alt |
| Imágenes decorativas tienen alt="" | Imágenes que no aportan información: `alt=""` | ✅ No procede | ✅ No procede | ✅ No procede | ✅ No procede | ✅ No procede | ✅ No procede |
| Imágenes enlazadas tienen texto alternativo | Links con imágenes deben tener alt descriptivo | ✅ Correcto. Product cards tienen alt con nombre producto | ✅ No procede | ✅ No procede | ✅ No procede | ✅ No procede | ✅ Correcto |
| Botones tienen texto alternativo | Botones con iconos deben tener `aria-label` | ✅ Corregido. Todos los botones de video controls, navegación y carrito con `aria-label` | ✅ Corregido. Botón valorar con `aria-label` | ✅ Correcto | ✅ Correcto | ✅ No procede | ✅ No procede |
| Inputs tienen label asociado | Todos los `<input>` con `<label>` o `aria-label` | ✅ Corregido. Buscador con `aria-label` y `<label>` oculto. Slider volumen con `<label>` | ✅ No procede | ✅ Correcto. Todos los campos con `<label for="">` | ✅ Correcto. Todos los campos con `<label for="">` | ✅ No procede | ✅ No procede |
| Contenido multimedia embebido identificado | Videos/iframes con título descriptivo | ✅ Corregido. Video con `aria-label`, iframes con `title` | ✅ No procede | ✅ No procede | ✅ No procede | ✅ No procede | ✅ No procede |
| Frames e iframes tienen título | `title` en todos los iframes | ✅ Correcto. Iframe juego con `title="Juego Tienda de Videojuegos"`, Maps con `title="Ubicación de Kairos"` | ✅ No procede | ✅ No procede | ✅ No procede | ✅ No procede | ✅ No procede |
| SVGs decorativos tienen aria-hidden | SVGs que son decorativos marcados con `aria-hidden="true"` | ✅ Corregido. SVGs de controles de video con `aria-hidden="true"` | ✅ No procede | ✅ No procede | ✅ No procede | ✅ Corregido. SVGs con `role="img"` y `aria-label` | ✅ No procede |

### 1.2.1 Solo audio o solo video pregrabado (Nivel A)

| Criterio | Recomendación | index.php | steam.php | playstation.php | xbox.php | nintendo.php |
|---|---|---|---|---|---|---|
| Videos tienen texto descriptivo | Alternativa textual para contenido de video | ✅ Corregido. Video tiene fallback `<p>` con enlace de descarga y `aria-label` descriptivo | ✅ Correcto | ✅ Correcto | ✅ Correcto | ✅ Correcto |

### 1.3.1 Información y relaciones (Nivel A)

| Criterio | Recomendación | Todas las páginas |
|---|---|---|
| Estructura semántica correcta | Uso de `<header>`, `<main>`, `<footer>`, `<nav>`, `<section>` | ✅ Correcto. Todas las páginas usan estructura semántica HTML5 |
| Encabezados ordenados | h1 > h2 > h3 en orden lógico | ✅ Correcto |
| Listas usadas correctamente | Menús de navegación usan `<ul>/<li>` | ✅ Correcto. Dropdown menu usa `<ul>` con `<li>` |

### 1.4.3 Contraste (Nivel AA)

| Criterio | Recomendación | Todas las páginas |
|---|---|---|
| Ratio de contraste mínimo 4.5:1 para texto normal | Verificar contraste de colores | ✅ Correcto. Tema oscuro con texto claro, buen contraste |

---

## 2. Operabilidad (Manejable)

### 2.1.1 Teclado (Nivel A)

| Criterio | Recomendación | index.php | detalles.php | login.php | Todas las páginas |
|---|---|---|---|---|---|
| Toda funcionalidad accesible por teclado | Tab, Enter, Escape funcionan | ✅ Corregido. Controles de video accesibles, estrellas de valoración cambiadas de `<span>` a `<button>` | ✅ Correcto | ✅ Correcto | ✅ Correcto |
| No hay trampas de teclado | El foco no queda atrapado | ✅ Correcto | ✅ Correcto | ✅ Correcto | ✅ Correcto |

### 2.4.1 Saltar bloques (Nivel A)

| Criterio | Recomendación | Todas las páginas |
|---|---|---|
| Enlace "Saltar al contenido" | Skip-to-content link al inicio de la página | ✅ Corregido. Añadido enlace "Saltar al contenido principal" en navigation.php, visible al recibir foco con Tab. Todas las páginas tienen `id="main-content"` en `<main>` |

### 2.4.2 Título de página (Nivel A)

| Criterio | Recomendación | Todas las páginas |
|---|---|---|
| Cada página tiene `<title>` descriptivo | Títulos únicos y descriptivos | ✅ Correcto. Cada página tiene título único: "Kairos - Tienda de Productos Digitales", "Login - Kairos", "Soporte - Kairos", etc. |

### 2.4.3 Orden del foco (Nivel A)

| Criterio | Recomendación | Todas las páginas |
|---|---|---|
| Orden de tabulación lógico | El foco sigue un orden visual coherente | ✅ Correcto. El orden de tabulación sigue el flujo visual de la página |

### 2.4.4 Propósito del enlace (Nivel A)

| Criterio | Recomendación | Todas las páginas |
|---|---|---|
| Enlaces describen su propósito | Texto del enlace o aria-label descriptivo | ✅ Corregido. Enlaces de iconos sociales en footer ahora tienen `aria-label`. Enlaces de navegación tienen `aria-label` descriptivo |

### 2.4.7 Foco visible (Nivel AA)

| Criterio | Recomendación | Todas las páginas |
|---|---|---|
| Indicador de foco visible | Outline visible al navegar con teclado | ✅ Corregido. Añadidos estilos `:focus-visible` con outline de 3px en color púrpura (#6f12e0) para todos los elementos interactivos |

---

## 3. Comprensibilidad (Comprensible)

### 3.1.1 Idioma de la página (Nivel A)

| Criterio | Recomendación | Todas las páginas |
|---|---|---|
| `<html lang="es">` presente | Declarar idioma del documento | ✅ Corregido. about.php y contact.php faltaban `lang="es"`, ahora corregido. Todas las demás páginas ya tenían `lang="es"` |

### 3.2.1 En foco (Nivel A)

| Criterio | Recomendación | Todas las páginas |
|---|---|---|
| No hay cambios de contexto al recibir foco | Elementos no disparan acciones al recibir foco | ✅ Correcto |

### 3.3.1 Identificación de errores (Nivel A)

| Criterio | Recomendación | login.php | register.php |
|---|---|---|---|
| Errores identificados claramente | Mensajes de error descriptivos | ✅ Correcto. Alertas con rol `alert` usando Bootstrap | ✅ Correcto |

### 3.3.2 Etiquetas o instrucciones (Nivel A)

| Criterio | Recomendación | login.php | register.php | contact.php |
|---|---|---|---|---|
| Formularios con labels descriptivos | Cada input tiene `<label>` asociado | ✅ Correcto | ✅ Correcto. Todos los campos con label y for | ✅ Correcto. Campos con label floating |

---

## 4. Robustez (Sólido)

### 4.1.1 Análisis sintáctico (Nivel A)

| Criterio | Recomendación | Todas las páginas |
|---|---|---|
| HTML válido, sin errores de parsing | IDs únicos, etiquetas cerradas | ✅ Correcto. PHP genera HTML válido. IDs únicos en cada página |

### 4.1.2 Nombre, rol, valor (Nivel A)

| Criterio | Recomendación | Todas las páginas |
|---|---|---|
| Componentes UI tienen nombre y rol accesible | ARIA roles y labels correctos | ✅ Corregido. Modal de valoración con `role="dialog"`, `aria-modal`, `aria-labelledby`. Offcanvas carrito con `role="dialog"`. Navegación con `role="navigation"`. Footer con `role="contentinfo"`. Estrellas de puntuación como `<button>` con `aria-label` |

---

## Resumen de Correcciones Realizadas

| Nº | Problema detectado | Acción realizada | Estado |
|---|---|---|---|
| 1 | `<html>` sin `lang` en about.php y contact.php | Añadido `lang="es"` | ✅ Corregido |
| 2 | Buscador sin label accesible | Añadido `<label>` oculto y `aria-label` | ✅ Corregido |
| 3 | Botones de navegación con solo iconos | Añadido `aria-label` a todos los botones de acción | ✅ Corregido |
| 4 | Iconos decorativos sin `aria-hidden` | Añadido `aria-hidden="true"` a iconos `<i>` y SVGs decorativos | ✅ Corregido |
| 5 | Enlaces sociales en footer sin texto accesible | Añadido `aria-label` ("Síguenos en TikTok", etc.) | ✅ Corregido |
| 6 | Video sin texto alternativo | Añadido `aria-label` y texto fallback `<p>` | ✅ Corregido |
| 7 | Controles de video sin labels | Añadido `aria-label` a Play/Pausa, Volumen, Pantalla completa | ✅ Corregido |
| 8 | Slider de volumen sin label | Añadido `<label>` oculto y `aria-label` | ✅ Corregido |
| 9 | Modal de valoración sin ARIA roles | Añadido `role="dialog"`, `aria-modal`, `aria-labelledby` | ✅ Corregido |
| 10 | Estrellas de puntuación no accesibles por teclado | Cambiadas de `<span>` a `<button>` con `aria-label` | ✅ Corregido |
| 11 | Textarea sin label | Añadido `<label>` oculto y `aria-label` | ✅ Corregido |
| 12 | Offcanvas carrito sin ARIA dialog | Añadido `role="dialog"` y `aria-modal="true"` | ✅ Corregido |
| 13 | Botones de producto sin contexto | Añadido `aria-label` con nombre del producto | ✅ Corregido |
| 14 | SVGs en soporte.php sin descripción | Añadido `role="img"` y `aria-label` | ✅ Corregido |
| 15 | Sin enlace "saltar al contenido" | Añadido skip-to-content link en navegación | ✅ Corregido |
| 16 | Sin indicadores de foco visible | Añadidos estilos `:focus-visible` con outline | ✅ Corregido |
| 17 | Footer sin semántica | Añadido `role="contentinfo"` y `<nav>` para enlaces | ✅ Corregido |
| 18 | Navegación sin `role` explícito | Añadido `role="navigation"` y `aria-label` | ✅ Corregido |
| 19 | Meta description vacío | Añadida descripción del sitio | ✅ Corregido |
| 20 | `<main>` sin id para skip-nav | Añadido `id="main-content"` en todas las páginas | ✅ Corregido |
