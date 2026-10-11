/**
 * Talisha Software — Interactive 3D Hero Scene
 * High-performance WebGL particle sphere & neural network nexus
 * Inspired by Apple & NVIDIA web experiences
 */

document.addEventListener('DOMContentLoaded', () => {
    const container = document.getElementById('three-canvas-container');
    if (!container) return;

    // Verify Three.js is available
    if (typeof THREE === 'undefined') {
        console.warn('Three.js not loaded. Falling back to CSS ambient effects.');
        return;
    }

    let scene, camera, renderer, particles, networkLines, torusGroup;
    let mouseX = 0, mouseY = 0;
    let targetX = 0, targetY = 0;
    const windowHalfX = window.innerWidth / 2;
    const windowHalfY = window.innerHeight / 2;

    function init() {
        // Scene Setup (Transparent without murky fog for crystal-clear background flare)
        scene = new THREE.Scene();

        // Camera Setup
        camera = new THREE.PerspectiveCamera(60, window.innerWidth / window.innerHeight, 1, 2000);
        camera.position.z = 600;

        // Group to hold all 3D structures
        torusGroup = new THREE.Group();
        scene.add(torusGroup);

        // 1. Cybernetic Particle Cloud
        const particleCount = 1800;
        const geometry = new THREE.BufferGeometry();
        const positions = new Float32Array(particleCount * 3);
        const colors = new Float32Array(particleCount * 3);

        const colorGold = new THREE.Color(0xf5a623);
        const colorRed = new THREE.Color(0xff3b30);
        const colorWhite = new THREE.Color(0xffffff);

        for (let i = 0; i < particleCount; i++) {
            // Distribute on sphere + toroidal spiral
            const radius = 280 + (Math.random() - 0.5) * 120;
            const theta = Math.random() * Math.PI * 2;
            const phi = Math.acos((Math.random() * 2) - 1);

            positions[i * 3] = radius * Math.sin(phi) * Math.cos(theta);
            positions[i * 3 + 1] = radius * Math.sin(phi) * Math.sin(theta);
            positions[i * 3 + 2] = radius * Math.cos(phi);

            // Interpolate colors
            const mixRatio = Math.random();
            const chosenColor = mixRatio > 0.6 ? colorGold : (mixRatio > 0.25 ? colorRed : colorWhite);
            colors[i * 3] = chosenColor.r;
            colors[i * 3 + 1] = chosenColor.g;
            colors[i * 3 + 2] = chosenColor.b;
        }

        geometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
        geometry.setAttribute('color', new THREE.BufferAttribute(colors, 3));

        // Create canvas particle texture for soft circular glow
        const canvas = document.createElement('canvas');
        canvas.width = 32;
        canvas.height = 32;
        const ctx = canvas.getContext('2d');
        const grad = ctx.createRadialGradient(16, 16, 0, 16, 16, 16);
        grad.addColorStop(0, 'rgba(255,255,255,1)');
        grad.addColorStop(0.3, 'rgba(245,166,35,0.8)');
        grad.addColorStop(1, 'rgba(0,0,0,0)');
        ctx.fillStyle = grad;
        ctx.fillRect(0, 0, 32, 32);

        const pTexture = new THREE.CanvasTexture(canvas);

        const pMaterial = new THREE.PointsMaterial({
            size: 6,
            map: pTexture,
            vertexColors: true,
            blending: THREE.AdditiveBlending,
            transparent: true,
            depthWrite: false
        });

        particles = new THREE.Points(geometry, pMaterial);
        torusGroup.add(particles);

        // 2. High-Tech Neural Wireframe Orbit Rings
        const ringGeo = new THREE.TorusGeometry(320, 2, 16, 100);
        const ringMat = new THREE.MeshBasicMaterial({
            color: 0xf5a623,
            wireframe: true,
            transparent: true,
            opacity: 0.15
        });
        const ring1 = new THREE.Mesh(ringGeo, ringMat);
        ring1.rotation.x = Math.PI / 3;
        torusGroup.add(ring1);

        const ring2 = new THREE.Mesh(new THREE.TorusGeometry(350, 1.5, 16, 100), new THREE.MeshBasicMaterial({
            color: 0xff3b30,
            wireframe: true,
            transparent: true,
            opacity: 0.12
        }));
        ring2.rotation.y = Math.PI / 4;
        ring2.rotation.x = -Math.PI / 6;
        torusGroup.add(ring2);

        // 3. WebGL Renderer
        renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true, powerPreference: 'high-performance' });
        renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
        renderer.setSize(window.innerWidth, window.innerHeight);
        container.appendChild(renderer.domElement);

        // Listeners
        window.addEventListener('resize', onWindowResize);
        document.addEventListener('mousemove', onMouseMove);
    }

    function onWindowResize() {
        camera.aspect = window.innerWidth / window.innerHeight;
        camera.updateProjectionMatrix();
        renderer.setSize(window.innerWidth, window.innerHeight);
    }

    function onMouseMove(event) {
        mouseX = (event.clientX - windowHalfX) * 0.4;
        mouseY = (event.clientY - windowHalfY) * 0.4;
    }

    // Animation Loop
    function animate() {
        requestAnimationFrame(animate);

        targetX = mouseX * 0.0008;
        targetY = mouseY * 0.0008;

        if (torusGroup) {
            torusGroup.rotation.y += 0.0018;
            torusGroup.rotation.x += 0.0008;

            // Smooth damping response to cursor
            torusGroup.rotation.y += (targetX - torusGroup.rotation.y * 0.1) * 0.05;
            torusGroup.rotation.x += (targetY - torusGroup.rotation.x * 0.1) * 0.05;
        }

        if (particles) {
            particles.rotation.y -= 0.0006;
        }

        renderer.render(scene, camera);
    }

    init();
    animate();
});
