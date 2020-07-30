<footer class="main-footer">
    <div class="footer-left">
        2020 <div class="bullet"></div> Dikembangkan oleh <a href="https://www.instagram.com/kknmum.umy005/">KKN.MuM.005</a>
    </div>
    <div class="footer-right">
        2.3.0
    </div>
</footer>
</div>
</div>

<!-- General JS Scripts -->
<script src="{{ url('assets/js/jquery-3.5.1.min.js') }}"></script>
<script src="{{ url('assets/js/popper.min.js') }}"></script>
<script src="{{ url('assets/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ url('assets/js/jquery.nicescroll.min.js') }}"></script>
<script src="{{ url('assets/js/moment.min.js') }}"></script>
<script src="{{ url('assets/js/stisla.js') }}"></script>

<!-- JS Libraies -->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<!-- Template JS File -->
<script src="{{ url('assets/js/scripts.js') }}"></script>
<script src="{{ url('assets/js/custom.js') }}"></script>

<!-- Page Specific JS File -->
<script src="{{ url('assets/js/page/index-0.js') }}"></script>

<livewire:scripts></livewire:scripts>


<script>
    $(document).ready(function() {
        $("#datatable").DataTable({
            "lengthMenu": [5, 10, 15],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Indonesian.json"
            }
        });
    })
</script>

@stack('modal')

@stack('js')

</body>

</html>