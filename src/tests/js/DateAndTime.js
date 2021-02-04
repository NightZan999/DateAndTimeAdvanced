class DateAndTime {
    constructor(timezone, format) {
        this.timezone = timezone; 
        this.format = format; 
    }

    getFormat() {
        return this.format; 
    }

    setFormat(x) {
        this.format = x;
    }

    getTimezone() {
        return this.timezone; 
    }

    setTimezone(x) {
        this.timezone = x;
    }

    FindTime(timezone = null, format = null) {
        if (timezone == null) timezone = this.timezone;    
        if (format == null) format = this.format; 


    }
}