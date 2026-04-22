<div class="col-sm-12">
    <div class="card">
        <div class="card-header">
            <h5>{{ $tblTitle }}</h5>
            @if($tblDescription)
                <small>{{ $tblDescription ?? '' }}</small>
            @endif
        </div>
        <div class="card-body">
            <div class="dt-responsive">
                <div id="{{ $tblId }}_wrapper" class="dt-container dt-bootstrap5">
                    <div class="dt-layout-row">
                        <div class="dt-layout-cell dt-start ">
                            <div class="dt-length"><select name="{{ $tblId }}_length" aria-controls="{{ $tblId }}"
                                    class="form-select form-select-sm" id="dt-length-10">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select><label for="dt-length-10"> entries per page</label></div>
                        </div>
                        <div class="dt-layout-cell dt-end ">
                            <div class="dt-search"><label for="dt-search-11">Search: </label><input type="search"
                                    class="form-control form-control-sm" id="dt-search-11" placeholder=""
                                    aria-controls="{{ $tblId }}"></div>
                        </div>
                    </div>
                    <div class="dt-layout-row dt-layout-table">
                        <div class="dt-layout-cell ">
                            <table id="{{ $tblId }}" class="table table-striped table-bordered nowrap dataTable"
                                aria-describedby="{{ $tblId }}_info" style="width: 1510px;">
                                <colgroup>
                                    <col style="width: 298.906px;">
                                    <col style="width: 418.203px;">
                                    <col style="width: 231.469px;">
                                    <col style="width: 138.641px;">
                                    <col style="width: 239.219px;">
                                    <col style="width: 183.562px;">
                                </colgroup>
                                <thead>
                                    <tr role="row">
                                        <th data-dt-column="0" rowspan="1" colspan="1"
                                            class="dt-orderable-asc dt-orderable-desc dt-ordering-asc"
                                            aria-sort="ascending" aria-label="Name: Activate to invert sorting"
                                            tabindex="0"><span class="dt-column-title" role="button">Name</span><span
                                                class="dt-column-order"></span></th>
                                        <th data-dt-column="1" rowspan="1" colspan="1"
                                            class="dt-orderable-asc dt-orderable-desc"
                                            aria-label="Position: Activate to sort" tabindex="0"><span
                                                class="dt-column-title" role="button">Position</span><span
                                                class="dt-column-order"></span></th>
                                        <th data-dt-column="2" rowspan="1" colspan="1"
                                            class="dt-orderable-asc dt-orderable-desc"
                                            aria-label="Office: Activate to sort" tabindex="0"><span
                                                class="dt-column-title" role="button">Office</span><span
                                                class="dt-column-order"></span></th>
                                        <th data-dt-column="3" rowspan="1" colspan="1"
                                            class="dt-type-numeric dt-orderable-asc dt-orderable-desc"
                                            aria-label="Age: Activate to sort" tabindex="0"><span
                                                class="dt-column-title" role="button">Age</span><span
                                                class="dt-column-order"></span></th>
                                        <th data-dt-column="4" rowspan="1" colspan="1"
                                            class="dt-type-date dt-orderable-asc dt-orderable-desc"
                                            aria-label="Start date: Activate to sort" tabindex="0"><span
                                                class="dt-column-title" role="button">Start date</span><span
                                                class="dt-column-order"></span></th>
                                        <th data-dt-column="5" rowspan="1" colspan="1"
                                            class="dt-type-numeric dt-orderable-asc dt-orderable-desc"
                                            aria-label="Salary: Activate to sort" tabindex="0"><span
                                                class="dt-column-title" role="button">Salary</span><span
                                                class="dt-column-order"></span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="sorting_1">Airi Satou</td>
                                        <td>Accountant</td>
                                        <td>Tokyo</td>
                                        <td class="dt-type-numeric">33</td>
                                        <td class="dt-type-date">2008/11/28</td>
                                        <td class="highlight dt-type-numeric">$162,700</td>
                                    </tr>
                                    <tr>
                                        <td class="sorting_1">Ashton Cox</td>
                                        <td>Junior Technical Author</td>
                                        <td>San Francisco</td>
                                        <td class="dt-type-numeric">66</td>
                                        <td class="dt-type-date">2009/01/12</td>
                                        <td class="dt-type-numeric">$86,000</td>
                                    </tr>
                                    <tr>
                                        <td class="sorting_1">Bradley Greer</td>
                                        <td>Software Engineer</td>
                                        <td>London</td>
                                        <td class="dt-type-numeric">41</td>
                                        <td class="dt-type-date">2012/10/13</td>
                                        <td class="dt-type-numeric">$132,000</td>
                                    </tr>
                                    <tr>
                                        <td class="sorting_1">Brielle Williamson</td>
                                        <td>Integration Specialist</td>
                                        <td>New York</td>
                                        <td class="dt-type-numeric">61</td>
                                        <td class="dt-type-date">2012/12/02</td>
                                        <td class="highlight dt-type-numeric">$372,000</td>
                                    </tr>
                                    <tr>
                                        <td class="sorting_1">Cedric Kelly</td>
                                        <td>Senior Javascript Developer</td>
                                        <td>Edinburgh</td>
                                        <td class="dt-type-numeric">22</td>
                                        <td class="dt-type-date">2012/03/29</td>
                                        <td class="highlight dt-type-numeric">$433,060</td>
                                    </tr>
                                    <tr>
                                        <td class="sorting_1">Charde Marshall</td>
                                        <td>Regional Director</td>
                                        <td>San Francisco</td>
                                        <td class="dt-type-numeric">36</td>
                                        <td class="dt-type-date">2008/10/16</td>
                                        <td class="highlight dt-type-numeric">$470,600</td>
                                    </tr>
                                    <tr>
                                        <td class="sorting_1">Colleen Hurst</td>
                                        <td>Javascript Developer</td>
                                        <td>San Francisco</td>
                                        <td class="dt-type-numeric">39</td>
                                        <td class="dt-type-date">2009/09/15</td>
                                        <td class="highlight dt-type-numeric">$205,500</td>
                                    </tr>
                                    <tr>
                                        <td class="sorting_1">Dai Rios</td>
                                        <td>Personnel Lead</td>
                                        <td>Edinburgh</td>
                                        <td class="dt-type-numeric">35</td>
                                        <td class="dt-type-date">2012/09/26</td>
                                        <td class="highlight dt-type-numeric">$217,500</td>
                                    </tr>
                                    <tr>
                                        <td class="sorting_1">Garrett Winters</td>
                                        <td>Accountant</td>
                                        <td>Tokyo</td>
                                        <td class="dt-type-numeric">63</td>
                                        <td class="dt-type-date">2011/07/25</td>
                                        <td class="highlight dt-type-numeric">$170,750</td>
                                    </tr>
                                    <tr>
                                        <td class="sorting_1">Gloria Little</td>
                                        <td>Systems Administrator</td>
                                        <td>New York</td>
                                        <td class="dt-type-numeric">59</td>
                                        <td class="dt-type-date">2009/04/10</td>
                                        <td class="highlight dt-type-numeric">$237,500</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr role="row">
                                        <th data-dt-column="0" rowspan="1" colspan="1"><span
                                                class="dt-column-title">Name</span></th>
                                        <th data-dt-column="1" rowspan="1" colspan="1"><span
                                                class="dt-column-title">Position</span></th>
                                        <th data-dt-column="2" rowspan="1" colspan="1"><span
                                                class="dt-column-title">Office</span></th>
                                        <th data-dt-column="3" rowspan="1" colspan="1" class="dt-type-numeric"><span
                                                class="dt-column-title">Age</span></th>
                                        <th data-dt-column="4" rowspan="1" colspan="1" class="dt-type-date"><span
                                                class="dt-column-title">Start date</span></th>
                                        <th data-dt-column="5" rowspan="1" colspan="1" class="dt-type-numeric"><span
                                                class="dt-column-title">Salary</span></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="dt-layout-row">
                        <div class="dt-layout-cell dt-start ">
                            <div class="dt-dark" aria-live="polite" id="{{ $tblId }}_info" role="status">Showing 1 to 10
                                of 20 entries</div>
                        </div>
                        <div class="dt-layout-cell dt-end ">
                            <div class="dt-paging paging_full_numbers">
                                <ul class="pagination">
                                    <li class="dt-paging-button page-item disabled"><button class="page-link first"
                                            role="link" type="button" aria-controls="{{ $tblId }}" aria-disabled="true"
                                            aria-label="First" data-dt-idx="first" tabindex="-1">«</button></li>
                                    <li class="dt-paging-button page-item disabled"><button class="page-link previous"
                                            role="link" type="button" aria-controls="{{ $tblId }}" aria-disabled="true"
                                            aria-label="Previous" data-dt-idx="previous" tabindex="-1">‹</button></li>
                                    <li class="dt-paging-button page-item active"><button class="page-link" role="link"
                                            type="button" aria-controls="{{ $tblId }}" aria-current="page"
                                            data-dt-idx="0" tabindex="0">1</button></li>
                                    <li class="dt-paging-button page-item"><button class="page-link" role="link"
                                            type="button" aria-controls="{{ $tblId }}" data-dt-idx="1"
                                            tabindex="0">2</button></li>
                                    <li class="dt-paging-button page-item"><button class="page-link next" role="link"
                                            type="button" aria-controls="{{ $tblId }}" aria-label="Next"
                                            data-dt-idx="next" tabindex="0">›</button></li>
                                    <li class="dt-paging-button page-item"><button class="page-link last" role="link"
                                            type="button" aria-controls="{{ $tblId }}" aria-label="Last"
                                            data-dt-idx="last" tabindex="0">»</button></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let rowCallBackTable = $(`#{{ $id }}`);
            rowCallBackTable.DataTable({
                createdRow: function (row, data, index) {
                    if (data[5].replace(/[\$,]/g, '') * 1 > 150000) {
                        $('td', row).eq(5).addClass('highlight');
                    }
                }
            });
        });
    </script>
@endpush
