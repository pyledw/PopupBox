-- This script creates the tables in the LeaseHood database.
-- Written for MySQL.



CREATE TABLE USER (
    UserID                          int(8)            NOT NULL                     AUTO_INCREMENT   PRIMARY KEY,
    IsApproved                      tinyint(1)        NOT NULL     DEFAULT '0',
    DateCreated                     date              NOT NULL,
    AccountType                     int(1)            NOT NULL,
    UserName                        varchar(100)      NOT NULL                     UNIQUE,
    IsSuspended                     tinyint(1)        NOT NULL     DEFAULT '0',
    Password                        char(34)                       DEFAULT NULL,
    Email                           varchar(120)                   DEFAULT NULL,
    SSN                             char(9)                        DEFAULT NULL,
    FirstName                       varchar(100)                   DEFAULT NULL,
    LastName                        varchar(100)                   DEFAULT NULL,
    Street                          varchar(100)                   DEFAULT NULL,
    City                            varchar(60)                    DEFAULT NULL,
    State                           char(2)                        DEFAULT NULL,
    Zip                             char(5)                        DEFAULT NULL,
    DateOfBirth                     date              NOT NULL
)     ENGINE=InnoDB 
    DEFAULT CHARSET=utf8 
    COLLATE=utf8_general_ci 
    COMMENT='Stores User Information';


CREATE TABLE APPLICATION (
    ApplicationID                   int(8)            NOT NULL                     AUTO_INCREMENT    PRIMARY KEY,
    UserID                          int(8)            NOT NULL,
    IsApproved                      tinyint(1)                     DEFAULT '0',
    EarlyMoveIn                     date                           DEFAULT NULL,
    LateMoveIn                      date                           DEFAULT NULL,
    IsADA                           tinyint(1)                     DEFAULT '0',
    IsSmokingRequired               tinyint(1)                     DEFAULT '0',
    NumOtherOccupants               int(2)                         DEFAULT NULL,
    SecondaryOccupantFName          varchar(30)                    DEFAULT NULL,
    SecondaryOccupantLName          varchar(40)                    DEFAULT NULL,
    SecondaryOccupantAge            int(3)                         DEFAULT NULL,
    SecondaryOccupantRelationship   varchar(20)                    DEFAULT NULL,
    ESignature                      varchar(40)                    DEFAULT NULL,
    CurrentEmployerName             varchar(50)                    DEFAULT NULL,
    CurrentSupFName                 varchar(30)                    DEFAULT NULL,
    CurentSupLName                  varchar(40)                    DEFAULT NULL,
    CurrentSupPhone                 varchar(15)                    DEFAULT NULL,
    CurrentPositionName             varchar(50)                    DEFAULT NULL,
    CurrentMonthsEmployed           varchar(50)                    DEFAULT NULL,
    CurrentAnnualSalary             int(9)                         DEFAULT NULL,
    PrevEmployerName                varchar(50)                    DEFAULT NULL,
    PrevSupFName                    varchar(30)                    DEFAULT NULL,
    PrevSupLName                    varchar(40)                    DEFAULT NULL,
    PrevSupPhone                    char(15)                       DEFAULT NULL,
    PrevPositionName                varchar(50)                    DEFAULT NULL,
    PrevMonthsEmployed              int(3)                         DEFAULT NULL,
    PrevAnnualSalary                int(9)                         DEFAULT NULL,
    CoAppEmployerName               varchar(50)                    DEFAULT NULL,
    CoAppSupFName                   varchar(30)                    DEFAULT NULL,
    CoAppSupLName                   varchar(40)                    DEFAULT NULL,
    CoAppSupPhone                   int(15)                        DEFAULT NULL,
    CoAppPositionName               varchar(50)                    DEFAULT NULL,
    CoAppMonthsEmployed             int(3)                         DEFAULT NULL,
    CoAppAnnualSalary               int(9)                         DEFAULT NULL,
    Vehicle1Desc                    varchar(60)                    DEFAULT NULL,
    Vehicle1LicenseNo               varchar(10)                    DEFAULT NULL,
    Vehicle1LicenseState            varchar(2)                     DEFAULT NULL,
    Vehicle2Desc                    varchar(60)                    DEFAULT NULL,
    Vehicle2LicenseNo               varchar(10)                    DEFAULT NULL,
    Vehicle2LicenseState            varchar(2)                     DEFAULT NULL,
    Vehicle3Desc                    varchar(60)                    DEFAULT NULL,
    Vehicle3LicenseNo               varchar(10)                    DEFAULT NULL,
    Vehicle3LicenseState            varchar(2)                     DEFAULT NULL,
    Vehicle4Desc                    varchar(60)                    DEFAULT NULL,
    Vehicle4LicenseNo               varchar(10)                    DEFAULT NULL,
    Vehicle4LicenseState            varchar(2)                     DEFAULT NULL,
    Pet1Type                        varchar(15)                    DEFAULT NULL,
    Pet1Weight                      int(3)                         DEFAULT NULL,
    Pet1Breed                       varchar(30)                    DEFAULT NULL,
    Pet1Age                         int(2)                         DEFAULT NULL,
    Pet2Type                        varchar(15)                    DEFAULT NULL,
    Pet2Weight                      int(3)                         DEFAULT NULL,
    Pet2Breed                       varchar(30)                    DEFAULT NULL,
    Pet2Age                         int(2)                         DEFAULT NULL,
    Pet3Type                        varchar(15)                    DEFAULT NULL,
    Pet3Weight                      int(3)                         DEFAULT NULL,
    Pet3Breed                       varchar(30)                    DEFAULT NULL,
    Pet3Age                         int(2)                         DEFAULT NULL,
    HasCrimHist                     tinyint(1)                     DEFAULT NULL,
    HasBankruptHist                 tinyint(1)                     DEFAULT NULL,
    HasEvictHist                    tinyint(1)                     DEFAULT NULL,
    CrimHistDesc                    varchar(100)                   DEFAULT NULL,
    BankruptHistDesc                varchar(100)                   DEFAULT NULL,
    EvictHistDescription            varchar(100)                   DEFAULT NULL,
    TotalConsumerDebt               int(8)                         DEFAULT NULL,
    TotalLoanDebt                   int(8)                         DEFAULT NULL,
    MonthlyDebtPayment              int(8)                         DEFAULT NULL,
    TotalAssets                     int(8)                         DEFAULT NULL,
    ContactFName                    varchar(30)                    DEFAULT NULL,
    ContactLName                    varchar(40)                    DEFAULT NULL,
    ContactAddress                  varchar(60)                    DEFAULT NULL,
    ContactState                    varchar(2)                     DEFAULT NULL,
    ContactZip                      char(5)                        DEFAULT NULL,
    ContactRelation                 varchar(20)                    DEFAULT NULL,
    ContactHomePhone                varchar(15)                    DEFAULT NULL,
    ContactWorkPhone                varchar(15)                    DEFAULT NULL,
    ContactCellPhone                varchar(15)                    DEFAULT NULL,
    PageCompleted                   int(1)            NOT NULL     DEFAULT '1',
    
    FOREIGN KEY (UserId) REFERENCES USER(UserID)
)     ENGINE=InnoDB 
    DEFAULT CHARSET=utf8 
    COLLATE=utf8_general_ci;
    
    
CREATE TABLE PROPERTY (
    PropertyID                      int(8)            NOT NULL                     AUTO_INCREMENT        PRIMARY KEY,
    UserID                          int(8)                         DEFAULT NULL,
    IsApproved                      tinyint(1)                     DEFAULT '0',
    IsPaid                          tinyint(1)                     DEFAULT '0',
    Address                         char(50)                       DEFAULT NULL,
    Zip                             char(5)                        DEFAULT NULL,
    city                            char(20)                       DEFAULT NULL,
    State                           char(2)                        DEFAULT NULL,
    County                          char(20)                       DEFAULT NULL,
    SF                              int(6)                         DEFAULT NULL,
    Bath                            int(2)                         DEFAULT NULL,
    Bedroom                         int(2)                         DEFAULT NULL,
    Garage                          char(15)                       DEFAULT NULL,
    AC                              char(20)                       DEFAULT NULL,
    Heating                         char(20)                       DEFAULT NULL,
    Media                           char(20)                       DEFAULT NULL,
    IceMaker                        tinyint(1)                     DEFAULT '0',
    DishWasher                      tinyint(1)                     DEFAULT '0',
    Disposal                        tinyint(1)                     DEFAULT '0',
    ClothesWasherHookup             tinyint(1)                     DEFAULT '0',
    ClothesDryerHookup              tinyint(1)                     DEFAULT '0',
    ClothesWasher                   tinyint(1)                     DEFAULT '0',
    ClothesDryer                    tinyint(1)                     DEFAULT '0',
    Microwave                       tinyint(1)                     DEFAULT '0',
    SecurityAlarm                   tinyint(1)                     DEFAULT '0',
    Deck                            tinyint(1)                     DEFAULT '0',
    Pool                            tinyint(1)                     DEFAULT '0',
    Fenced                          tinyint(1)                     DEFAULT '0',
    ADACompliant                    tinyint(1)                     DEFAULT '0',
    AllowCriminalHistory            tinyint(1)                     DEFAULT '0',
    MinimumSalary                   int(8)                         DEFAULT NULL,
    AllowSmoking                    tinyint(1)                     DEFAULT '0',
    AllowCats                       tinyint(1)                     DEFAULT '0',
    AllowDogs                       tinyint(1)                     DEFAULT '0',
    PetDepost                       int(6)                         DEFAULT NULL,
    AllowPetDepositRefund           tinyint(1)                     DEFAULT '0',
    Lattitude                       char(15)                       DEFAULT NULL,
    Longitude                       char(15)                       DEFAULT NULL,
    Description                     text,
    DateAvailable                   date                           DEFAULT NULL,
    DatePFOAccept                   datetime                       DEFAULT NULL,
    DatePFOEndAccept                datetime                       DEFAULT NULL,
    DateTimeOpenHouse1              datetime                       DEFAULT NULL,
    DateTimeOpenHouse2              datetime                       DEFAULT NULL,
    StartingBid                     decimal(9,2)                   DEFAULT NULL,
    MinBidIncrement                 decimal(8,2)                   DEFAULT NULL,
    RequiredDeposit                 decimal(8,2)                   DEFAULT NULL,
    RentNowRate                     decimal(9,2)                   DEFAULT NULL,
    MinimumTerm                     int(3)                         DEFAULT NULL,
    PreMarket                       tinyint(1)                     DEFAULT '0',
    
    FOREIGN KEY (UserID) REFERENCES USER(UserId)
)     ENGINE=InnoDB  
    DEFAULT CHARSET=utf8 
    COLLATE=utf8_general_ci;
	
	
CREATE TABLE IMAGE (
	ImageId	                    int(8)            NOT NULL                     AUTO_INCREMENT        PRIMARY KEY,
	PropertyId                  int(8)            NOT NULL,
	ImagePathOriginal           char(50),
	ImagePathThumb              char(50),
	FOREIGN KEY (PropertyId) REFERENCES PROPERTY(PropertyId)
)     ENGINE=InnoDB  
    DEFAULT CHARSET=utf8 
    COLLATE=utf8_general_ci;

    
CREATE TABLE AUCTION (
    AuctionID                       int(8)            NOT NULL                     AUTO_INCREMENT        PRIMARY KEY,
    PropertyID                      int(8)            NOT NULL,
    DateAvailable                   date                           DEFAULT NULL,
    DatePFOAccept                   date                           DEFAULT NULL,
    DatePFOEndAccept                date                           DEFAULT NULL,
    DateTimeOpenHouse1              datetime                       DEFAULT NULL,
    DateTimeOpenHouse2              datetime                       DEFAULT NULL,
    StartingBid                     decimal(9,2)                   DEFAULT NULL,
    MinBidIncrement                 decimal(8,2)                   DEFAULT NULL,
    RequiredDeposit                 decimal(8,2)                   DEFAULT NULL,
    RentNowRate                     decimal(9,2)                   DEFAULT NULL,
    MinimumTerm                     int(3)                         DEFAULT NULL,
    PreMarket                       tinyint(1)                     DEFAULT '0',
    
    FOREIGN KEY (PropertyId) REFERENCES PROPERTY(PropertyId)
)     ENGINE=InnoDB 
    DEFAULT CHARSET=utf8 
    COLLATE=utf8_general_ci;


CREATE TABLE BID (
    BidID                           int(8)            NOT NULL                     AUTO_INCREMENT        PRIMARY KEY,
    AuctionID                       int(8)            NOT NULL,
    UserId                          int(8)            NOT NULL,
    MonthlyRate                     decimal(9,2)      NOT NULL     DEFAULT '0.00',
    TimeReceived                    timestamp         NOT NULL     DEFAULT CURRENT_TIMESTAMP,
    
    FOREIGN KEY (UserId)            REFERENCES USER            (UserId),
    FOREIGN KEY (AuctionId)         REFERENCES AUCTION        (AuctionId)
)     ENGINE=InnoDB 
    DEFAULT CHARSET=utf8 
    COLLATE=utf8_general_ci;


CREATE TABLE DENIEDBREED (
    BreedID                         int(8)            NOT NULL                     AUTO_INCREMENT        PRIMARY KEY,
    PropertyID                      int(8)            NOT NULL,
    BreedName                       char(40)                       DEFAULT NULL,
    FOREIGN KEY (PropertyId) REFERENCES PROPERTY(PropertyId)
)     ENGINE=InnoDB DEFAULT 
    CHARSET=utf8 
    COLLATE=utf8_general_ci;

    
CREATE TABLE FEE (
    FeeID                           int(8)            NOT NULL                     AUTO_INCREMENT        PRIMARY KEY,
    UserID                          int(8)            NOT NULL,
    FeeType                         int(1)            NOT NULL,
    TransactionDateTime             timestamp         NOT NULL     DEFAULT CURRENT_TIMESTAMP,
    Amount                          decimal(9,2)      NOT NULL     DEFAULT '0.00',
    ApplicationID                   int(8)                         DEFAULT NULL,
    AuctionID                       int(8)                         DEFAULT NULL,
    PaymentServiceID                int(1)                         DEFAULT NULL,
    PaymentToken                    char(40)                       DEFAULT NULL,
    TransactionStatusID             int(1)                         DEFAULT NULL,
    
    FOREIGN KEY (UserId)            REFERENCES USER            (UserId),
    FOREIGN KEY (ApplicationId)     REFERENCES APPLICATION    (ApplicationId),
    FOREIGN KEY (AuctionId)         REFERENCES AUCTION        (AuctionId)
)     ENGINE=InnoDB 
    DEFAULT CHARSET=utf8 
    COLLATE=utf8_general_ci;


CREATE TABLE PREVIOUSRESIDENCE (
    PrevResidenceID                 int(8)             NOT NULL                     AUTO_INCREMENT        PRIMARY KEY,
    ApplicationID                   int(8)             NOT NULL,
    PrevStreetAddress               varchar(60)                    DEFAULT NULL,
    PrevCity                        varchar(20)                    DEFAULT NULL,
    PrevState                       varchar(2)                     DEFAULT NULL,
    PrevZip                         char(5)                        DEFAULT NULL,
    PrevLandLordFName               varchar(30)                    DEFAULT NULL,
    PrevLandLordLName               varchar(40)                    DEFAULT NULL,
    PrevPhone                       varchar(15)                    DEFAULT NULL,
    ReasonForLeaving                varchar(100)                   DEFAULT NULL,
    TypeOfResidence                 varchar(20)                    DEFAULT NULL,
    PrevMonthlyRent                 int(5)                         DEFAULT NULL,
    TotalMonths                     int(3)                         DEFAULT NULL,
    FOREIGN KEY (ApplicationId)     REFERENCES APPLICATION    (ApplicationId)
)     ENGINE=InnoDB  
    DEFAULT CHARSET=utf8 
    COLLATE=utf8_general_ci;


