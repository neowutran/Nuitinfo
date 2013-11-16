<h1>Gallery</h1>
<div ng-controller='ControllerGalleryImage'
     id='images_list'>
    <div infinite-scroll='nextPage()'
         ng-init="nextPage()"
         infinite-scroll-disabled='busy'
         infinite-scroll-distance='1'>
        <div ng-repeat='(key,image) in images'>
            <div class='image'>
                <a href='javascript:void(0)'>
                    <img ng-click="followLink(image.gallery,image.galleryStructure,
					key)"
                         class="clickable"
                         alt='{{image.description}}'
                         src='{{image.thumb}}' />
                </a>
                <!--<span>{{key}}{{image.description}}</span>-->
            </div>
        </div>
    </div>
    <div class="galleria"></div>
</div>
