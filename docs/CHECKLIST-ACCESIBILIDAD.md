# ✅ Checklist de Accesibilidad y Usabilidad - Kairos

**Versión:** 1.0  
**Fecha:** 20 de febrero de 2026  
**Uso:** Imprimir y marcar durante desarrollo/testing

---

## 🎯 WCAG 2.1 Nivel A - Requisitos mínimos

### 1. Perceptible

#### Alternativas de texto
- [ ] Todas las imágenes tienen atributo `alt` descriptivo
- [ ] Logos tienen `alt` que indica destino del enlace
- [ ] Imágenes decorativas tienen `alt=""` o `aria-hidden="true"`
- [ ] Iconos funcionales tienen `aria-label` o texto visible
- [ ] Videos tienen transcripciones o subtítulos

#### Información y relaciones
- [ ] Encabezados en orden jerárquico (H1 → H2 → H3)
- [ ] Un solo H1 por página
- [ ] Labels asociados a todos los inputs (`for` + `id`)
- [ ] Listas semánticas (`<ul>`, `<ol>`, `<dl>`)
- [ ] Tablas con `<th>` y atributo `scope`
- [ ] Estructura HTML5 (`<main>`, `<nav>`, `<header>`, `<footer>`)

#### Navegación por teclado
- [ ] Todos los elementos interactivos son enfocables con TAB
- [ ] Orden de tabulación lógico (sin `tabindex` positivos)
- [ ] Skip link al inicio de la página
- [ ] No hay trampas de teclado (se puede salir de todo)
- [ ] Modales se pueden cerrar con Esc

#### Navegación
- [ ] Todas las páginas tienen `<title>` único y descriptivo
- [ ] Links tienen texto descriptivo (no "click aquí")
- [ ] Propósito de cada enlace es claro por contexto

### 2. Comprensible

#### Idioma
- [ ] `<html lang="es">` en todas las páginas
- [ ] Cambios de idioma marcados con `lang` cuando aplique

#### Predecible
- [ ] Foco no cambia el contexto automáticamente
- [ ] Cambios de input no causan cambios de contexto
- [ ] Navegación consistente en todas las páginas

#### Asistencia
- [ ] Errores identificados con mensajes claros
- [ ] Todos los campos de formulario tienen `<label>` visible
- [ ] Campos requeridos indicados (asterisco + texto)

### 3. Robusto

#### Compatibilidad
- [ ] HTML válido (sin errores de sintaxis)
- [ ] IDs únicos en cada página
- [ ] Elementos anidados correctamente
- [ ] ARIA usado correctamente

---

## 🎯 WCAG 2.1 Nivel AA - Calidad mejorada

### Contraste
- [ ] Texto normal: ratio mínimo 4.5:1
- [ ] Texto grande (≥18pt): ratio mínimo 3:1
- [ ] Elementos gráficos: ratio mínimo 3:1
- [ ] Estados (hover, focus, disabled) tienen contraste suficiente
- [ ] Verificado con WebAIM Contrast Checker

### Responsive
- [ ] Zoom hasta 200% sin pérdida de funcionalidad
- [ ] No se requiere scroll horizontal
- [ ] Sin límite de `maximum-scale` en viewport
- [ ] Touch targets de mínimo 44x44px en móvil

### Navegación mejorada
- [ ] Múltiples formas de encontrar contenido (menú, búsqueda, mapa)
- [ ] Encabezados descriptivos y únicos
- [ ] Indicador de foco visible y claro

### Formularios avanzados
- [ ] Atributos `autocomplete` en campos aplicables
- [ ] Instrucciones y formato esperado indicados
- [ ] Sugerencias ante errores (no solo "error")
- [ ] Prevención de errores en acciones críticas (confirmación)

### Estados
- [ ] Cambios de estado anunciados (`role="alert"`, `role="status"`)
- [ ] Loading states comunicados
- [ ] Success/error feedback visible y programático

---

## 🎨 Usabilidad - Jakob Nielsen

### 1. Visibilidad del estado del sistema
- [ ] Hover en botones muestra feedback visual
- [ ] Estados de inputs visibles (neutral, focus, valid, invalid)
- [ ] Spinners durante operaciones asíncronas
- [ ] Badges de stock actualizados
- [ ] Toast notifications para acciones importantes

### 2. Concordancia sistema-mundo real
- [ ] Lenguaje natural sin jerga técnica
- [ ] Iconos universales y reconocibles
- [ ] Metáforas familiares (carrito, favoritos)
- [ ] Fechas en formato local
- [ ] Precios con símbolo de moneda local

### 3. Control y libertad del usuario
- [ ] Confirmación antes de acciones destructivas
- [ ] Botón "Cancelar" en todos los formularios
- [ ] Opción de salir/cerrar siempre visible
- [ ] Deshacer cuando sea posible
- [ ] Logout accesible en todo momento

### 4. Consistencia y estándares
- [ ] Mismo framework CSS en toda la app
- [ ] Variables de diseño definidas y usadas
- [ ] Espaciado consistente
- [ ] Tipografía consistente
- [ ] Navegación idéntica en todas las páginas

### 5. Prevención de errores
- [ ] Validación HTML5 (required, type, pattern)
- [ ] Validación JavaScript en tiempo real
- [ ] Validación backend robusta
- [ ] Autocomplete para reducir errores
- [ ] Inputmode correcto en móvil
- [ ] CAPTCHA para prevenir spam

### 6. Reconocimiento antes que recuerdo
- [ ] Placeholders con ejemplos
- [ ] Helper text con formato esperado
- [ ] Valores por defecto cuando aplique
- [ ] Iconos + texto en botones
- [ ] Página actual destacada en navegación

### 7. Flexibilidad y eficiencia
- [ ] Skip link para usuarios avanzados
- [ ] Atajos de teclado documentados
- [ ] Opción de búsqueda avanzada
- [ ] Acciones en lote (cuando aplique)

### 8. Diseño estético y minimalista
- [ ] Jerarquía visual clara
- [ ] Espaciado generoso y respiración
- [ ] Paleta de colores limitada y armoniosa
- [ ] Solo información necesaria visible
- [ ] Sin elementos superfluos

### 9. Ayuda con errores
- [ ] Mensajes de error específicos
- [ ] Sugerencias de corrección incluidas
- [ ] Formato esperado mostrado en ejemplo
- [ ] Links de ayuda relevantes
- [ ] Feedback visual + textual

### 10. Ayuda y documentación
- [ ] FAQ disponible
- [ ] Sección de ayuda/soporte
- [ ] Tooltips en funciones complejas
- [ ] Documentación clara y accesible

---

## 📱 Responsive Design

### Mobile (< 768px)
- [ ] Hamburger menu funcional
- [ ] Formularios en 1 columna
- [ ] Grid de productos en 1 columna
- [ ] Touch targets ≥ 44x44px
- [ ] Font-size ≥ 16px (previene zoom iOS)
- [ ] Inputs con inputmode apropiado

### Tablet (768px - 991px)
- [ ] Menu horizontal compacto
- [ ] Formularios en 2 columnas
- [ ] Grid de productos en 2-3 columnas
- [ ] Tablas con scroll horizontal si necesario

### Desktop (≥ 992px)
- [ ] Menu completo horizontal
- [ ] Formularios en 2-3 columnas
- [ ] Grid de productos en 4 columnas
- [ ] Tablas full width sin scroll

---

## ✅ Validación de Formularios

### Capa 1: HTML5
- [ ] Atributo `required` en campos obligatorios
- [ ] `type="email"` para emails
- [ ] `type="tel"` para teléfonos
- [ ] `type="url"` para URLs
- [ ] `minlength` y `maxlength` apropiados
- [ ] `pattern` para formatos específicos

### Capa 2: JavaScript
- [ ] Validación en tiempo real (evento `blur` o `input`)
- [ ] Clases `.is-valid` y `.is-invalid`
- [ ] `setCustomValidity()` para mensajes personalizados
- [ ] Prevención de submit si hay errores
- [ ] Scroll a primer error

### Capa 3: Backend PHP
- [ ] Validación de tipos de datos
- [ ] Regex para formatos específicos
- [ ] Rangos de valores aceptables
- [ ] Sanitización de inputs
- [ ] Prevención de duplicados
- [ ] Validación de relaciones (foreign keys)

### Capa 4: Base de Datos
- [ ] Constraints (NOT NULL, UNIQUE, CHECK)
- [ ] Foreign keys definidas
- [ ] Tipos de datos correctos
- [ ] Índices en campos de búsqueda

---

## 🎨 Sistema de Diseño

### Colores
- [ ] Colores principales definidos en variables
- [ ] Colores de feedback (success, danger, warning, info)
- [ ] Colores neutros (grises, blanco, negro)
- [ ] Ratio de contraste ≥ 4.5:1 verificado

### Espaciado
- [ ] Sistema de espaciado modular (4px, 8px, 16px, 24px, 32px)
- [ ] Padding y margin consistentes
- [ ] Espaciado entre secciones claro

### Tipografía
- [ ] Font-size base: 16px
- [ ] Jerarquía clara: H1, H2, H3, body, small
- [ ] Line-height apropiado (1.5-1.6 para body)
- [ ] Font-weight consistente

### Bordes y sombras
- [ ] Border-radius definido (4px, 8px, 12px)
- [ ] Sombras para elevación (sm, md, lg)
- [ ] Bordes con color y grosor consistente

---

## 🔍 Testing Manual

### Navegación por teclado
- [ ] Tab recorre en orden lógico
- [ ] Shift+Tab funciona en reversa
- [ ] Enter activa enlaces y botones
- [ ] Space funciona en checkboxes
- [ ] Esc cierra modales y menús
- [ ] Flechas en elementos de navegación

### Lectores de pantalla
- [ ] NVDA lee todo el contenido
- [ ] JAWS navega sin problemas
- [ ] VoiceOver anuncia cambios
- [ ] TalkBack funciona en móvil
- [ ] Landmarks identificados correctamente
- [ ] ARIA labels leídos apropiadamente

### Zoom
- [ ] 100% - diseño normal
- [ ] 125% - sin problemas
- [ ] 150% - sin scroll horizontal
- [ ] 200% - funcional con scroll vertical
- [ ] Zoom navegador respetado
- [ ] Pinch zoom en móvil funciona

### Dispositivos
- [ ] iPhone (Safari)
- [ ] Android (Chrome)
- [ ] iPad (Safari)
- [ ] Desktop Windows (Chrome, Firefox, Edge)
- [ ] Desktop Mac (Safari, Chrome)

---

## 📊 Métricas a Medir

### Performance
- [ ] LCP (Largest Contentful Paint) < 2.5s
- [ ] FID (First Input Delay) < 100ms
- [ ] CLS (Cumulative Layout Shift) < 0.1
- [ ] Tamaño de página < 2MB
- [ ] Número de requests < 50

### Usabilidad
- [ ] Tasa de conversión
- [ ] Tasa de rebote < 40%
- [ ] Tiempo en página > 2 min
- [ ] Task Success Rate > 90%
- [ ] Time on Task (registro) < 3 min
- [ ] Error Rate < 5%

### Accesibilidad
- [ ] Lighthouse Accessibility Score ≥ 95
- [ ] WAVE: 0 errores críticos
- [ ] axe DevTools: 0 violaciones

---

## 🔧 Herramientas Recomendadas

### Testing automático
- [ ] Lighthouse (Chrome DevTools) - F12 → Lighthouse
- [ ] WAVE (Chrome/Firefox extension)
- [ ] axe DevTools (Chrome/Firefox extension)
- [ ] Pa11y (CLI tool)
- [ ] Accessibility Insights (Microsoft)

### Contraste
- [ ] WebAIM Contrast Checker
- [ ] Contrast Ratio (Lea Verou)
- [ ] Color Oracle (simulador de daltonismo)

### Validación
- [ ] W3C HTML Validator
- [ ] W3C CSS Validator
- [ ] AChecker (WCAG validator)

### Lectores de pantalla
- [ ] NVDA (Windows - gratis)
- [ ] JAWS (Windows - pago)
- [ ] VoiceOver (Mac/iOS - integrado)
- [ ] TalkBack (Android - integrado)
- [ ] ChromeVox (Chrome extension)

---

## 📝 Notas de Testing

**Fecha:** _______________  
**Tester:** _______________  
**Página testeada:** _______________

### Problemas encontrados:

1. _________________________________________________
   Severidad: ⬜ Crítico  ⬜ Alto  ⬜ Medio  ⬜ Bajo
   
2. _________________________________________________
   Severidad: ⬜ Crítico  ⬜ Alto  ⬜ Medio  ⬜ Bajo
   
3. _________________________________________________
   Severidad: ⬜ Crítico  ⬜ Alto  ⬜ Medio  ⬜ Bajo

### Observaciones:

___________________________________________________________

___________________________________________________________

___________________________________________________________

---

<p align="center">
  <strong>✅ Checklist v1.0 - Kairos</strong><br>
  Creado por GitHub Copilot | 20 de febrero de 2026
</p>
