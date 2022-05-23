<!-- start: Content -->
<div id="content" class="span10">
    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url('dashboard')?>">Home</a>
            <i class="icon-angle-right"></i> 
        </li>
        <li>
            <i class="icon-edit"></i>
            <a href="<?php echo base_url('add/product')?>">Tambah Produk</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Tambah Produk</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <style type="text/css">
                #result{color:red;padding: 5px}
                #result p{color:red}
            </style>
            <div id="result">
                <p><?php echo $this->session->flashdata('message');?></p>
            </div>
            <div class="box-content">
                <form class="form-horizontal" action="<?php echo base_url('save/product');?>" method="post" enctype="multipart/form-data">
                    <fieldset>

                        <div class="control-group">
                            <label class="control-label" for="fileInput">Nama produk</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="product_title" id="fileInput" type="text"/>
                            </div>
                        </div>          
                        <div class="control-group">
                            <label class="control-label" for="textarea2">Deskripsi Singkat Produk</label>
                            <div class="controls">
                                <textarea class="cleditor" name="product_short_description" id="textarea2" rows="2"></textarea>
                            </div>
                        </div>        
                        <div class="control-group">
                            <label class="control-label" for="textarea2">Deskripsi</label>
                            <div class="controls">
                                <textarea class="cleditor" name="product_long_description" id="textarea2" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Foto Produk</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="product_image" id="fileInput" type="file"/>
                            </div>
                        </div> 
                        
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Harga Produk</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="product_price" id="fileInput" type="text"/>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Banyak Produk</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="product_quantity" id="fileInput" type="text"/>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Kategori Produk</label>
                            <div class="controls">
                                <select name="product_category">
                                    <?php foreach($all_published_category as $single_category){?>
                                    <option value="<?php echo $single_category->id;?>"><?php echo $single_category->category_name;?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div> 
                        
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Brand</label>
                            <div class="controls">
                                <select name="product_brand" >
                                    <?php foreach($all_published_brand as $single_brand){?>
                                    <option value="<?php echo $single_brand->brand_id;?>"><?php echo $single_brand->brand_name;?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div> 
                        
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Product Featured</label>
                            <div class="controls">
                                <input class="span6 typeahead" value="0" name="product_feature" id="fileInput" type="radio" checked="true"/> Unfeature
                                <input class="span6 typeahead" value="1" name="product_feature" id="fileInput" type="radio" />Featured
                             </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label" for="textarea2">Status Publikasi</label>
                            <div class="controls">
                                <select name="publication_status">
                                    <option value="1">Published</option>
                                    <option value="0">UnPublished</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <button type="reset" class="btn">Reset</button>
                            <a href="<?php echo base_url('manage/product')?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus glyphicon-white"></i>Back</a>                         
                        </div>
                    </fieldset>
                </form>   

            </div>
        </div><!--/span-->

    </div><!--/row-->


</div><!--/.fluid-container-->

<!-- end: Content -->