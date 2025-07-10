            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                google.charts.load('current', {
                    packages: ["orgchart"]
                });
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Name');
                    data.addColumn('string', 'Manager');
                    data.addColumn('string', 'ToolTip');

                    data.addRows([
                        [{
                            v: 'CEO',
                            f: 'CEO<div style="color:red; font-style:italic">Szef</div>'
                        }, '', 'CEO'],
                        ['Manager A', 'CEO', 'Manager A'],
                        ['Manager B', 'CEO', 'Manager B'],
                        ['Pracownik 1', 'Manager A', 'Pracownik 1'],
                        ['Pracownik 2', 'Manager A', 'Pracownik 2'],
                        ['Pracownik 3', 'Manager B', 'Pracownik 3']
                    ]);

                    var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
                    chart.draw(data, {
                        allowHtml: true
                    });
                }
            </script>
            <div id="chart_div"></div>