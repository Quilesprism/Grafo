document.addEventListener("DOMContentLoaded", () => {
    fetch('../routes/api.php')
        .then(response => response.json())
        .then(data => {
            const nodes = [];
            const links = [];
            const nodeCount = {};
            const linkCount = {};
            data.forEach(player => {
                const trayectoria = player.trayectoria;
                const movimiento = player.movimiento; 
                const jugador = player.estudiante;
                if (!nodeCount[trayectoria]) {
                    nodeCount[trayectoria] = 0;
                }
                nodeCount[trayectoria]++;
                if (!nodes.find(node => node.id === trayectoria && node.jugador === jugador)) {
                    nodes.push({ id: trayectoria, jugador, size: nodeCount[trayectoria] });
                }
                    
                const movimientoAnterior = data.find(p => 
                    p.estudiante === jugador && 
                    p.movimiento === movimiento - 1
                );
            
                if (movimientoAnterior) {
                    const linkKey = `${movimientoAnterior.trayectoria}-${trayectoria}`;
                    
                    
                    if (!linkCount[linkKey]) {
                        linkCount[linkKey] = 0;
                    }
                    linkCount[linkKey]++;
                    
                    links.push({
                        source: movimientoAnterior.trayectoria,
                        target: trayectoria,
                        jugador,
                        width: linkCount[linkKey]
                    });
                }
            });
            console.log('Node Count:', nodeCount);
            console.log('Link Count:', linkCount);

            let zoom = d3.zoom()
            .on('zoom', handleZoom);
        const svg = d3.select('#graphCanvas')
            .attr('width', '100%')
            .attr('height', '100%')
            .call(zoom);
        const { width, height } = svg.node().getBoundingClientRect();


        const simulation = d3.forceSimulation(nodes)
            .force('link', d3.forceLink(links).id(d => d.id).distance(100))
            .force('charge', d3.forceManyBody().strength(-3))
            .force('center', d3.forceCenter(width / 2, height / 2))
            .on('tick', ticked)
            

        const link = svg.selectAll('.link')
            .data(links)
            .enter().append('line')
            .attr('class', 'link')
            .attr('stroke-width', d => d.width);

        const node = svg.selectAll('.node')
            .data(nodes)
            .enter().append('circle')
            .attr('class', 'node')
            .attr('r', d => d.size * 4) 
            .call(d3.drag()
                .on('start', dragstarted)
                .on('drag', dragged)
                .on('end', dragended));

        
            function ticked() {
            node.attr('cx', d => d.x = Math.max(10, Math.min(width - 10, d.x))) 
                .attr('cy', d => d.y = Math.max(10, Math.min(height - 10, d.y))); 

            link.attr('x1', d => d.source.x)
                .attr('y1', d => d.source.y)
                .attr('x2', d => d.target.x)
                .attr('y2', d => d.target.y);
        }

        node.on('click', function(event, d) {
            const playerData = data.find(player => player.trayectoria.includes(d.id.toString()));
            
            Swal.fire({
                title: 'Información del Estudiante',
                html: `
                    <strong>Estudiante:</strong> ${playerData.estudiante}<br>
                    <strong>Pregunta 1:</strong> ${playerData.Pregunta_1}<br>
                    <strong>Pregunta 2:</strong> ${playerData.Pregunta_2}<br>
                    <strong>Pregunta 3:</strong> ${playerData.Pregunta_3}<br>
                    <strong>Pregunta 4:</strong> ${playerData.Pregunta_4}<br>
                    <strong>Pregunta 5:</strong> ${playerData.Pregunta_5}<br>
                    <strong>Pregunta 6:</strong> ${playerData.Pregunta_6}<br>
                    <strong>Intento:</strong> ${playerData.intento}<br>
                    <strong>Movimiento:</strong> ${playerData.movimiento}<br>
                    <strong>Trayectoria:</strong> ${playerData.trayectoria}<br>
                    `,
                showCloseButton: true,
                focusConfirm: false,
                confirmButtonText: 'Cerrar'
            });
        });
        function handleZoom(e) {
            d3.select('g.chart')
              .attr('transform', e.transform);
          }
        function dragstarted(event, d) {
            if (!event.active) simulation.alphaTarget(0.2).restart();
            d.fx = d.x;
            d.fy = d.y;
        }

        function dragged(event, d) {
            d.fx = event.x;
            d.fy = event.y;
        }

        function dragended(event, d) {
            if (!event.active) simulation.alphaTarget(0);
            d.fx = null;
            d.fy = null;
        }

        })
        .catch(error => {
            console.error("Error al cargar los datos:", error);
        });
});