modul.data_management["ติดตามสถานะเหตุการณ์"] = function(){
    var url = 'thaiwater30/backoffice/data_management/event_tracking_option_list';
    describe('GET : ' + url, function(){
        var result;
        before(function(done){
            apiService.SendRequest("GET",url,{},function(){
                result = unittest.cb(done, arguments);
            },function(){
                result = unittest.cb(done, arguments);
            });
        });
        it('should return status code 200', function(done){
            result.jqXHR.status.should.equal(200);
            done();
        });
        it('should have property result', function(done){
            result.data.should.have.property('result');
            done();
        });
        it('should have property data', function(done){
            result.data.should.have.property('data');
            done();
        });
    });
}
