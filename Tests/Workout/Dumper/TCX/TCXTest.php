<?php

namespace SportTrackerConnector\Tests\Workout\Dumper\TCX;

use DateTime;
use SportTrackerConnector\Workout\Dumper\TCX;
use SportTrackerConnector\Workout\Workout;
use SportTrackerConnector\Workout\Workout\Extension\HR;
use SportTrackerConnector\Workout\Workout\SportMapperInterface;
use SportTrackerConnector\Workout\Workout\Track;
use SportTrackerConnector\Workout\Workout\TrackPoint;

/**
 * Test the TCX dumper.
 */
class TCXTest extends \PHPUnit_Framework_TestCase
{

    /**
     * Test dumping a workout to a TCX string.
     */
    public function testDumpToStringSingleActivity()
    {
        $workout = new Workout();
        $workout->addTrack(
            new Track(
                array(
                    $this->getTrackPoint('53.551075', '9.993672', '2014-05-30T17:12:58+00:00', 11, 78),
                    $this->getTrackPoint('53.550085', '9.992682', '2014-05-30T17:13:00+00:00', 10, 88)
                ),
                SportMapperInterface::RUNNING
            )
        );

        $tcx = new TCX();
        $actual = $tcx->dumpToString($workout);

        $this->assertXmlStringEqualsXmlFile(__DIR__ . '/Expected/testDumpToStringSingleActivity.tcx', $actual);
    }

    /**
     * Test dumping a workout to a TCX string.
     */
    public function testDumpToStringMultiActivity()
    {
        $workout = new Workout();
        $workout->addTrack(
            new Track(
                array(
                    $this->getTrackPoint('53.551075', '9.993672', '2014-05-30T17:12:58+00:00', 11, 78),
                    $this->getTrackPoint('53.550085', '9.992682', '2014-05-30T17:12:59+00:00', 10, 88)
                ),
                SportMapperInterface::RUNNING
            )
        );
        $workout->addTrack(
            new Track(
                array(
                    $this->getTrackPoint('53.549075', '9.991672', '2014-05-30T17:13:00+00:00', 9, 98),
                    $this->getTrackPoint('53.548085', '9.990682', '2014-05-30T17:13:01+00:00', 8, 108)
                ),
                SportMapperInterface::SWIMMING
            )
        );

        $tcx = new TCX();
        $actual = $tcx->dumpToString($workout);

        $this->assertXmlStringEqualsXmlFile(__DIR__ . '/Expected/testDumpToStringMultiActivity.tcx', $actual);
    }

    /**
     * Get a track point.
     *
     * @param string $lat The latitude.
     * @param string $lon The longitude.
     * @param string $time The time.
     * @param integer $ele The elevation.
     * @param integer $hr The heart rate.
     * @return TrackPoint
     */
    private function getTrackPoint($lat, $lon, $time, $ele, $hr)
    {
        $trackPoint = new TrackPoint($lat, $lon, new DateTime($time));
        $trackPoint->setElevation($ele);
        $extensions = array(
            new HR($hr)
        );
        $trackPoint->setExtensions($extensions);
        return $trackPoint;
    }
}
